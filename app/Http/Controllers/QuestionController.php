<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Topic;
use App\Question;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function validateQuestion(array $data)
    {
        return \Validator::make($data,[
            'question_title' => ['required']
        ]);
    }

    public function addQuestion()
    {
        $topics = \DB::table('topics')->distinct()->get();
        return view('addquestion',compact('topics'));
    }

    public function insertQuestion(Request $r)
    {
        $this->validateQuestion($r->all())->validate();

        $question_title = $r->input('question_title');
        $question_topic = $r->input('question_topic');
        $user_id = \Session::get('userId');

        \DB::table('questions')->insert([
            'question_title' => $question_title,
            'topic_id' => $question_topic,
            'question_status' => '1',
            'id' => $user_id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        return redirect('home');
    }

    public function updateQuestion($questionid)
    {
        $question = \DB::table('questions')
                    ->join('topics','questions.topic_id','=','topics.topic_id')
                    ->select('questions.*')
                    ->where('questions.question_id','=',$questionid)
                    ->get();

        $topics = Topic::all();

        return view('updatequestion')->with('question',$question)->with('topics',$topics);
    }

    public function editQuestion(Request $r)
    {
        $title = $r->input('question_title');
        $topicid = $r->input('question_topic');
        $questionid = $r->input('question_id');

        $updatedetails = [
            'question_title' => $title,
            'topic_id' => $topicid
        ];

        \DB::table('questions')
            ->where('question_id','=',$questionid)
            ->update($updatedetails);

        return redirect('DisplayQuestion');
    }

    public function displayQuestion()
    {
        $myId = \Session::get('userId');
        $myquestions = \DB::table('questions')
                        ->join('users','questions.id','=','users.id')
                        ->join('topics','questions.topic_id','=','topics.topic_id')
                        ->select('questions.*','users.name','topics.topic_name','users.photo')
                        ->where('questions.id','=',$myId)
                        ->paginate(10);

        return view('myquestion',compact('myquestions'));
    }

    public function deleteQuestion($questionid)
    {
        $question = Question::where('question_id',$questionid);
        $question->delete();

        return redirect('DisplayQuestion');
    }
}
