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
            @foreach ($questions as $question)
                <div class="card">
                    <div class="card-header">{{ $question->topic_name }}</div>
                    <div class="card-body">
                        <img src="{{ $question->photo }}" alt="Profile_Picture" width="30px" height="40px">
                        <div class="card-title">{{ $question->question_title }}</div>
                        <div class="card-text">{{ $question->name }}</div>
                        <div class="class-text">{{ $question->created_at }}</div>
                        <a href="" class="btn btn-danger">Answer</a>
                    </div>
                </div>
                <br/>
            @endforeach
            <div style="width:100%; display:flex; justify-content:center;">{{$questions->links()}}</div>
        </div>
    </div>
</div>
@endsection
