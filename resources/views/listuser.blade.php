@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <a href="/AddUser" style="margin-top:40px;" class="btn btn-danger">Add User</a>
            <br/>
            <br/>
            <span style="display:none;">{{$i=1}}</span>
            <table border="1" class="table" style="text-align: center;">
                <thead class="thead-dark" >
                    <th scope="col">#</th>
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Address</th>
                    <th scope="col">Profile Picture</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Action</th>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>
                            @if ($user->isAdmin==1)
                                {{"Admin"}}
                            @else
                                {{"Member"}}
                            @endif
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->gender }}</td>
                        <td>{{ $user->address }}</td>
                        <td><img src="{{ asset('storage/images/'.$user->photo) }}" width="200px" height="200px"/></td>
                        <td>{{ $user->dateofbirth }}</td>
                        <td>
                            <a href="/UpdateUser/{{$user->id}}" class="btn btn-warning" style="width:100%; margin-bottom:30px; margin-top:30px;">Edit</a>
                            <a href="/DeleteUser/{{$user->id}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
