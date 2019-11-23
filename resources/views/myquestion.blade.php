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
                    <div class="card-header">
                        <div>{{ $question->topic_name }}</div>
                    </div>
                    <div class="card-body" style="display:flex; justify-content:space-between;">
                        <div>
                            <img src="{{ asset('storage/images/'.$question->photo) }}" alt="Profile_Picture" width="60px" height="60px">
                            <div class="card-title">{{ $question->question_title }}</div>
                            <div class="card-text">{{ $question->name }}</div>
                            <div class="class-text">{{ $question->created_at }}</div>
                            <div>
                                <a href="" class="btn btn-primary">See Answer</a>
                                <a href="/UpdateQuestion/{{$question->question_id}}" class="btn btn-warning">Edit</a>
                                <a href="/DeleteQuestion/{{$question->question_id}}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        <div>
                            @if($question->question_status=='1')
                                <span class="btn btn-warning">Open</span>
                            @else
                                <span class="btn btn-danger">Closed</span>
                            @endif
                        </div>
                    </div>
                </div>
                <br/>
            @endforeach
            {{$myquestions->links()}}
            {{-- <div style="width:100%; display:flex; justify-content:center;">{{$myquestions->links()}}</div> --}}
        </div>
    </div>
</div>
@endsection
