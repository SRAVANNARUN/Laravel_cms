@extends('layouts.app')

@section('content')
    <div class="card card-default mt-2">
        <div class="card-header">
            My Profile
        </div>
        <div class="card-body">
            <form action="{{route('users.update-profile')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" id="" cols="5" rows="5" class="form-control" >{{$user->about}}</textarea>
                </div>
                <button class="btn btn-success">Update</button>
            </form>
        </div>
    </div>
@endsection
