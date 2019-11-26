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
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
                    ->where('question_status','=','1')
                    ->orderByRaw('questions.question_id')
                    ->paginate(10);

        return view('home',compact('questions'));
    }

    public function searchQuestionName(Request $r)
    {
        if($r->ajax())
        {
            $results = "";
            $questions = \DB::table('questions')
                         ->where('question_title','LIKE','%'.$r->keyword.'%')
                         ->get();
        }
    }
}
