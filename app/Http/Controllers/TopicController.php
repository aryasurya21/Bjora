<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
class TopicController extends Controller
{
    public function displayAll()
    {
        $topics = Topic::all();

        return view('listtopic',compact('topics'));
    }
    public function addTopic()
    {
        return view('addtopic');
    }
    public function insertTopic(Request $r)
    {
        $this->validate($r, Topic::$topicRules);
        $topictitle = $r->input('topic_name');

        $topic = new Topic;
        $topic->topic_name = $topictitle;
        $topic->save();
        return redirect('ListTopic');
    }
    public function editTopic(Request $r)
    {
        $topicid = $r->input('topic_id');
        $topicname = $r->input('topic_name');

        $updatefield = [
            'topic_name' => $topicname
        ];

        \DB::table('topics')
            ->where('topic_id','=',$topicid)
            ->update($updatefield);

        return redirect('ListTopic');
    }
    public function updateTopic($topicid)
    {
        $topic = Topic::where('topic_id',$topicid)->first();

        return view('updatetopic',compact('topic',$topic));
    }
    public function deleteTopic($topicid)
    {
        $topic = Topic::where('topic_id',$topicid);
        $topic->delete();

        return back();
    }
}
