@extends('layouts.app')


@section('content')
    <div class="d-flex justify-content-end mt-2 mb-2">

        <a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a>
    </div>

    <div class="card">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
            @if($posts->count()>0)
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Tile</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><img class="rounded-circle" width="50" height="50" src="{{asset('storage/').'/'.$post->image}}" alt=""></td>
                            <td>{{$post->title}}</td>
                            <td>
                                @if(!$post->trashed())
                                    <a href="" class="btn btn-info btn-xs ">Edit</a>
                                @endif
                            </td>
                            <td>
                                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        {{$post->trashed() ? 'Delete' : 'Trash'}}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                @else
                <h3 class="text-center">No Posts</h3>
            @endif
        </div>
    </div>
@endsection


