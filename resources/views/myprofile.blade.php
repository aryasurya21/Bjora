@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body" style="display:flex; justify-content: space-between;">
                    <div style="display:flex;">
                        <div style="display:flex; align-items: center;">
                            <img src="{{ asset('storage/images/'.$user->photo) }}" alt="Profile_Picture" width="150px" height="150px" style="border-radius:100%;">
                        </div>
                        <div style="display:flex; flex-direction: column; margin-left:30px;">
                            <div class="card-title" style="font-size:25px; font-weight: bolder;">{{ $user->name }}</div>
                            <div class="card-text">{{ $user->email }}</div>
                            <div class="class-text">{{ $user->address }}</div>
                            <div class="class-text">{{ $user->dateofbirth }}</div>
                        </div>
                    </div>
                    @if(Session::get('userId')==$user->id)
                    <div>
                        <a class="btn btn-info" href="/UpdateUser/{{$user->id}}">Update Profile</a>
                    </div>
                    @endif
                </div>
                    @if(Session::get('userId')!=$user->id)
                    <hr>
                    <div class="card-body">
                        <form method="POST" action="{{ route('sendmessage') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col">
                                    <textarea name="message_content" cols="72" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary" style="font-weight:bolder; text-align:center; background-color:#e0ba5e; border-radius:40px; border:none;">
                                        {{ __('Send Message') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
