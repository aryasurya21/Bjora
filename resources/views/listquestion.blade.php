@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="/AddQuestion" style="margin-top:40px;" class="btn btn-danger">Add Question</a>
            <br/>
            <br/>
            <span style="display:none;">{{$i=1}}</span>
            <table border="1" class="table" style="text-align: center;">
                <thead class="thead-dark" >
                    <th scope="col">#</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Owner</th>
                    <th scope="col">Question</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                @foreach($questions as $q)
                    <tr>
                        <td scope="row">{{$i++}}</td>
                        <td scope="row">{{ $q->topic_name }}</td>
                        <td scope="row">{{ $q->name }}</td>
                        <td scope="row">{{ $q->question_title }}</td>
                        <td>
                            @if ($q->question_status=='1')
                                <span class="btn btn-success">{{"Open"}}</span>
                            @else
                                <span class="btn btn-danger">{{"Closed"}}</span>
                            @endif
                        </td>
                        <td>
                            @if($q->question_status==1)
                                <a href="/CloseQuestion/{{$q->question_id}}" class="btn btn-info" style="margin-bottom:5px; margin-top:5px;">Close</a>
                            @endif
                            <a href="/UpdateQuestion/{{$q->question_id}}" class="btn btn-warning">Edit</a>
                            <a href="/DeleteQuestion/{{$q->question_id}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
