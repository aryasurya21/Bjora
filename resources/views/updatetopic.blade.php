@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Topic') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('edittopic') }}">
                            @csrf

                            <input name="topic_id" type="text" value="{{$topic->topic_id}}" style="display:none; !important"/>
                            <div class="form-group row">
                                <div class="col">
                                    <input type="text" name="topic_name" value={{$topic->topic_name}} class="form-control @error('topic_name') is-invalid @enderror"/>
                                    @error('topic_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary" style="font-weight:bolder; width:100%; text-align:center; background-color:#e0ba5e; border-radius:40px; border:none;">
                                        {{ __('Update Topic') }}
                                    </button>
                                {{--
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
