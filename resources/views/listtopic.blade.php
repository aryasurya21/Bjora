@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="/AddTopic" style="margin-top:40px;" class="btn btn-danger">Add Topic</a>
            <br/>
            <br/>
            <span style="display:none;">{{$i=1}}</span>
            <table border="1" class="table" style="text-align: center;">
                <thead class="thead-dark" >
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                @foreach($topics as $topic)
                    <tr>
                        <td scope="row">{{$i++}}</td>
                        <td scope="row">{{ $topic->topic_name }}</td>
                        <td>
                            <a href="/UpdateTopic/{{$topic->topic_id}}" class="btn btn-warning">Edit</a>
                            <a href="/DeleteTopic/{{$topic->topic_id}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
