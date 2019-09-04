@extends('layouts.app')


@section('content')

    <div class="card card-default mt-2">
        <div class="card-header">
            {{isset($post) ? 'Edit' : 'Create Post'}}
        </div>
        <div class="card-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            <form action="{{isset($post) ? route('posts.update', $post->id) : route('posts.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" name="title" value="{{isset($post) ? $post->title : ''}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description">{{isset($post) ? $post->description : ''}}</textarea>
                </div>
                <div class="form-group ">
                    <label for="content">Content</label>
                    <input id="content" type="hidden" name="content" value="{{isset($post) ? $post->content : ''}}">
                    <trix-editor input="content"></trix-editor>

                </div>
                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" id="published_at" class="form-control" name="published_at" value="{{isset($post) ? $post->published_at : ''}}" >
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                @if(isset($post))
                                    @if($category->id==$post->category_id)
                                            selected
                                            @endif
                                    @endif
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                @if(isset($post))
                    <div class="form-group">
                        <img src="{{asset('storage/').'/'.$post->image}}" alt="" style="width: 100%" class="rounded">
                    </div>
                @endif
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>


                    @if($tags->count()>0)
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}"
                                            @if(isset($post))
                                                @if($post->hasTag($tag->id))
                                                    selected
                                                 @endif
                                            @endif
                                    >
                                        {{$tag->name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                <div class="form-group">
                    <button type="submit" class="btn btn-success">{{isset($post) ? 'Update Post' : 'Create Post'}}</button>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
    <script>
        flatpickr('#published_at', {
            enableTime:true
        })
        $(document).ready(function() {
            $('.tags-selector').select2();
        });
    </script>
@endsection

