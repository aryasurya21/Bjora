@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($messages as $m)
            <div class="card">
                <div class="card-body">
                    <div style="display:flex; justify-content:space-between;">
                        <div style="display:flex;">
                            <div style="display:flex; align-items: center;">
                                <img src="{{ asset('storage/images/'.$m->photo) }}" alt="Profile_Picture" width="150px" height="150px" style="border-radius:100%;">
                            </div>
                            <div style="display:flex; flex-direction: column; margin-left:30px;">
                                <div class="card-title" style="font-size:25px; font-weight: bolder;"><a href="/DisplayProfile/{{$m->id}}">{{ $m->name }}<a></div>
                                <div class="card-text">Posted at : {{ $m->posted_at }}</div>
                                <div class="class-text">Message : {{ $m->message_content }}</div>
                            </div>
                        </div>
                        <div>
                            <a class="btn btn-danger" style="color:white;" href="/DeleteMessage/{{$m->message_id}}">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            @endforeach
            <div style="width:100%; display:flex; justify-content:center;">{{$messages->links()}}</div>
        </div>
    </div>
</div>
@endsection
