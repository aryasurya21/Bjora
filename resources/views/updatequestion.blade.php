@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update Question') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('editquestion') }}">
                            {{csrf_field()}}

                            <input name="question_id" type="text" value="{{$question[0]->question_id}}" style="display:none; !important"/>
                            <div class="form-group row">
                                <div class="col">
                                    <textarea name="question_title" class="form-control @error('question_title') is-invalid @enderror">{{ $question[0]->question_title}}</textarea>
                                    @error('question_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <select name="question_topic" class="form-control">
                                        @foreach ($topics as $topic)
                                            <option value="{{$topic->topic_id}}" {{ old('topic_id') == $question[0]->topic_id ? 'selected' : ''}}>
                                                {{$topic->topic_name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary" style="font-weight:bolder; width:100%; text-align:center; background-color:#e0ba5e; border-radius:40px; border:none;">
                                        {{ __('Update Question') }}
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
