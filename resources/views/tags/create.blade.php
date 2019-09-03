@extends('layouts.app')


@section('content')

    <div class="card card-default mt-2">
        <div class="card-header">
            {{isset($tag) ? 'Edit Tag' : 'Create Tag'}}
        </div>
        <div class="card-body">
            @if($errors->any())
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            @endif
            <form action="{{isset($tag) ? route('tags.update', $tag->id) : route('tags.store')}}" method="POST">
                @if(isset($tag))
                    @method('PUT')
                @endif
                @csrf
                <div class="form-group">
                    <label for="name"></label>
                    <input type="text" id="name" class="form-control" name="name" value="{{isset($tag) ? $tag->name : ''}}">
                </div>
                <button type="submit" class="btn btn-primary">
                    {{isset($tag) ? 'Update Tag' : 'Create Tag'}}
                </button>
            </form>
        </div>
    </div>
@endsection