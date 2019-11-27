<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function displayAll()
    {
        $users = User::all();
        return view('listuser',compact('users',$users));
    }

    public function addUser()
    {
        return view('adduser');
    }

    public function uploadFile(){
        $request = \Request::capture();
        $name = uniqid().$request->file('photo')->getClientOriginalName();
        $request->photo->move(storage_path('app/public/images'),$name);
        return $name;
    }

    public function insertUser(Request $r)
    {
        $this->validate($r, User::$registerRules);
        $file = $this->uploadFile();

        $data = $r->only('name','email','password','gender','address','photo','dateofbirth','isAdmin');
        $data['isAdmin'] = 0;
        $data['password'] = \Hash::make($data['password']);
        $data['photo'] = $file;

        $user = User::create($data);

        return redirect('ListUser');
    }

    public function updateUser($userid)
    {
        $user = \DB::table('users')
                ->select('users.*')
                ->where('users.id','=',$userid)
                ->first();
        return view('updateuser')->with('user',$user);
    }

    public function editUser(Request $r)
    {
        $this->validate($r, User::$updateRules);
        $file = $this->uploadFile();

        $id = $r->input('id');
        $name = $r->input('name');
        $email = $r->input('email');
        $gender = $r->input('gender');
        $address = $r->input('address');
        $password = $r->input('password');
        $dateofbirth = $r->input('dateofbirth');

        $updatedetails = [
            'name' => $name,
            'email' => $email,
            'password' => \Hash::make($password),
            'gender' => $gender,
            'address' => $address,
            'photo' => $file,
            'dateofbirth' => $dateofbirth,
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
        ];

        \DB::table('users')
            ->where('users.id','=',$id)
            ->update($updatedetails);

        return redirect('ListUser');
    }

    public function deleteUser($userid)
    {
        $user = User::where('users.id','=',$userid);
        $user->delete();

        return back();
    }

    public function showProfile($userid)
    {
        $user = User::where('users.id','=',$userid)->first();
        return view('myprofile',compact('user',$user));
    }

    public function showInbox($userid)
    {
        if(\Session::get('userId')!=$userid){
            return redirect('home');
        }
        $messages = \DB::table('messages')
                    ->join('users','users.id','=','messages.sender_id')
                    ->join('user_message','messages.message_id','=','user_message.message_id')
                    ->select('messages.*','users.*','user_message.*')
                    ->where('user_message.receiver_id','=',$userid)
                    ->paginate(10);

        return view('myinbox',compact('messages',$messages));
    }
}
