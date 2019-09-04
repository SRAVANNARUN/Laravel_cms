@extends('layouts.app')


@section('content')


    <div class="card mt-2">
        <div class="card-header">
            Users
        </div>
        <div class="card-body">
            @if($users->count()>0)
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>Image</td>
                            <td>{{$user->name}}</td>

                            <td>
                                {{$user->email}}
                            </td>
                            @if(!$user->isAdmin())
                                <td>
                                    <form action="{{route('users.make-admin', $user->id)}} " method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">Make Admin</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No Users</h3>
            @endif
        </div>
    </div>
@endsection


