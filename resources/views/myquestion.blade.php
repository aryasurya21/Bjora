@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @foreach ($myquestions as $question)
                <div class="card">
                    <div class="card-header" style="display:flex; justify-content:space-between;">
                        <div>{{ $question->topic_name }}</div>
                        <div>
                            @if ($question->question_status==1)
                                <span style="background-color:green; color:white; padding:5px; font-size:15px; border-radius:10px;">Open</span>
                            @else
                                <span style="background-color:yellow; color:black; padding:5px; font-size:15px; border-radius:10px;">Closed</span>
                            @endif
                        </div>
                    </div>
                    <div class="card-body" style="display:flex; justify-content:space-between;">
                        <div style="display:flex; flex-direction:column;">
                            <div style="display:flex">
                                <div>
                                    <img src="{{ asset('storage/images/'.$question->photo) }}" alt="Profile_Picture" style="border-radius:100%;" width="100px" height="100px">
                                </div>
                                <div style="display:flex; flex-direction:column; margin-left:20px;">
                                    <div class="card-title" style="font-weight: bolder; font-size:25px;">{{ $question->question_title }}</div>
                                    <div class="card-text"><b>{{ $question->name }}</b> At: {{ $question->created_at }}</div>
                                </div>
                            </div>
                            <br>
                            <div>
                                <a href="/DisplayAnswer/{{$question->question_id}}" class="btn btn-primary">See Answer</a>
                                <a href="/UpdateQuestion/{{$question->question_id}}" class="btn btn-warning">Edit</a>
                                <a href="/DeleteQuestion/{{$question->question_id}}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>
                </div>
                <br/>
            @endforeach
            {{$myquestions->links()}}
        </div>
    </div>
</div>
@endsection
