@extends('layouts.app')


@section('content')

    <div class="card card-default mt-2">
        <div class="card-header">
            {{isset($category) ? 'Edit Category' : 'Create Category'}}
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
            <form action="{{isset($category) ? route('categories.update', $category->id) : route('categories.store')}}" method="POST">
                @if(isset($category))
                    @method('PUT')
                @endif
                @csrf
                <div class="form-group">
                    <label for="name"></label>
                    <input type="text" id="name" class="form-control" name="name" value="{{isset($category) ? $category->name : ''}}">
                </div>
                <button type="submit" class="btn btn-primary">
                    {{isset($category) ? 'Update Category' : 'Create Category'}}
                </button>
            </form>
        </div>
    </div>
@endsection