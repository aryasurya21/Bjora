<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function addQuestion()
    {
        $topics = \DB::table('topics')->distinct()->get();
        return view('addquestion',compact('topics'));
    }
    public function insertQuestion(Request $r)
    {
        $question_title = $r->input('question_title');
        $question_topic = $r->input('question_topic');
        \DB::table('questions')->insert([
            'question_title' => $question_title,
            'topic_id' => $question_topic,
            'question_status' => '1',
            'id' => $name
        ]);
        return redirect('home');
    }
}
