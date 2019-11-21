<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $questions = \DB::table('questions')
                    ->join('users','questions.id','=','users.id')
                    ->join('topics','questions.topic_id','=','topics.topic_id')
                    ->select('questions.*','users.name','topics.topic_name','users.photo')
                    ->orderByRaw('questions.question_id')
                    ->paginate(3);

        return view('home',compact('questions'));
    }
}
