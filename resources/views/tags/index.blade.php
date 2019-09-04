@extends('layouts.app')


@section('content')
    <div class="d-flex justify-content-end mt-2 mb-2">

        <a href="{{route('tags.create')}}" class="btn btn-success">Add Tag</a>
    </div>
    <div class="card card-default">
        <div class="card-header">
            Tags
        </div>
        <div class="card-body">
            @if($tags->count()>0)
                <table class="table">
                    <thead>
                    <th>Name</th>
                    <th>Tags Count</th>
                    <th></th>
                    <th></th>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->posts->count()}}</td>
                            <td><a style="color: white" href="{{route('tags.edit', $tag->id)}}" class="btn btn-warning btn-sm float-right">Edit</a></td>
                            <td><button class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})">Delete</button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">No tags</h3>
            @endif

            <form action="" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="DeleteModelLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="DeleteModelLabel">Delete tags</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this tag?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id){
            var form=document.getElementById('deleteForm')
            form.action='/tags/'+id
            // console.log(form)
            $('#deleteModel').modal('show')
        }
    </script>
@endsection

