@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div>
                <span class="form">
                    <form method="POST" action="/Search">
                        @csrf

                        <input style="width:25vw; padding:6px; border-radius:10px;" name="keyword" type="text" placeholder="Search by Question or Username" aria-label="Search by Question or Username">
                        <button class="btn btn-info" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </span>
            </div>
            <br/>
            @foreach ($questions as $question)
                <div class="card">
                    <div class="card-header">
                        {{ $question->topic_name }}
                    </div>
                    <div class="card-body" style="display:flex;">
                        <div style="display:flex; flex-direction: column;">
                            <img src="{{ asset('storage/images/'.$question->photo) }}" alt="Profile_Picture" width="100px" height="100px" style="border-radius:100%;">
                            <a href="/DisplayAnswer/{{$question->question_id}}" class="btn btn-danger" style="margin-top:20px;">Answer</a>
                        </div>
                        <div style="margin-left:30px;">
                            <div class="card-title" style="font-size:25px; font-weight:bolder;">{{ $question->question_title }}</div>
                            <div class="card-text"><a href="/DisplayProfile/{{$question->id}}"><b>{{ $question->name }}</b></a> At : {{ $question->created_at }}</div>
                        </div>
                    </div>
                </div>
                <br/>
            @endforeach
            <div style="width:100%; display:flex; justify-content:center;">{{$questions->links()}}</div>
        </div>
    </div>
</div>
@endsection
