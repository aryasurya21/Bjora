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
                <div class="card">
                    <div class="card-header">
                        <div>{{ $question[0]->topic_name }}</div>
                    </div>
                    <div class="card-body" style="display:flex;">
                        <div style="display:flex;">
                            <div>
                                <img style="border-radius:100%;" src="{{ asset('storage/images/'.$question[0]->photo) }}" alt="Profile_Picture" width="100px" height="100px">
                            </div>
                            <div style="display: flex; flex-direction:column; padding-left:20px;">
                                <span class="card-title" style="font-weight:bolder; font-size:25px;">{{ $question[0]->question_title }}</span>
                                <div class="card-text"><b>{{ $question[0]->name }}</b> At: {{ $question[0]->created_at }}</div>
                            </div>
                        </div>
                    </div>
                    <div style="padding-left:50px;">
                        @foreach($answers as $answer)
                        <div class="card-body">
                            <div style="display:flex; justify-content: space-between;">
                                <div style="display:flex;">
                                    <div>
                                        <img style="border-radius:100px;" src="{{ asset('storage/images/'.$answer->photo) }}" alt="Profile_Picture" width="100px" height="100px">
                                    </div>
                                    <div style="display: flex; flex-direction:column; justify-content: center; margin-left:10px;">
                                        <span class="card-title" style="font-weight: bolder;">{{ $answer->name }}</span>
                                        <span class="class-text">{{ $answer->created_at }}</span>
                                    </div>
                                </div>
                                <div>
                                    @if (Session::get('userId')==$answer->id)
                                        <a href="/DeleteAnswer/{{$answer->answer_id}}" class="btn btn-danger">Delete</a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-text" style="border:solid 2px grey; padding: 10px; margin-top:30px; border-radius:40px;">{{ $answer->answers }}</div>
                        </div>
                        @if(!$loop->last) <hr style="background:grey;"/> @endif
                        @endforeach
                    </div>
                    @guest

                    @else
                        @if(Session::get('userId')!=$question[0]->id)
                        <form method="POST" action="{{ route('addanswer') }}">
                            @csrf
                            <input name="question_id" type="text" value="{{$question[0]->question_id}}" style="display:none; !important"/>
                            <div style="padding-left:50px;" class="card-body">
                                    <textarea name="answer_content" rows="5" class="form-control @error('answer_content') is-invalid @enderror"></textarea>
                                    @error('answer_content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <button type="submit" class="btn btn-primary" style="font-weight:bolder;text-align:center; background-color:#e0ba5e; border-radius:40px; border:none; margin-top:20px;">
                                        {{ __('Add Answer') }}
                                    </button>
                            </div>
                        </form>
                        @endif
                    @endguest

                </div>
                </div>
                <br/>
            {{-- <div style="width:100%; display:flex; justify-content:center;">{{$myquestions->links()}}</div> --}}
        </div>
    </div>
</div>
@endsection
