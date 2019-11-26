<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use Carbon\Carbon;

class AnswerController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function displayAnswer($questionid)
    {
        $question = \DB::table('questions')
                    ->join('topics','questions.topic_id','=','topics.topic_id')
                    ->join('users','questions.id','=','users.id')
                    ->select('questions.*','topics.*','users.*')
                    ->where('questions.question_id','=',$questionid)
                    ->get();


        $answers = \DB::table('answers')
                  ->join('users','answers.id','=','users.id')
                  ->select('answers.*','users.*')
                  ->where('answers.question_id','=',$questionid)
                  ->get();

        return view('answers')->with('answers',$answers)->with('question',$question);
    }

    public function validateAnswer(array $data)
    {
        return \Validator::make($data,[
            'answer_content' => ['required','max:191']
        ]);
    }

    public function addAnswer(Request $r)
    {
        $this->validateAnswer($r->all())->validate();
        //inserting using eloquent
        $answer = new Answer;
        $answer->answers = $r->answer_content;
        $answer->question_id = $r->question_id;
        $answer->id = \Session::get('userId');
        $answer->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $answer->save();

        return back();
    }

    public function deleteAnswer($answerid)
    {
        $answer = Answer::where('answer_id','=',$answerid);
        $answer->delete();

        return back();
    }
}
