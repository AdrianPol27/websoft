@extends('layouts.dash')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="margin-left:15px;">File Upload </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('uploads.create')}}" title="Upload file"> <i class="fas fa-plus-circle">Add file</i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg" style="margin-left:15px;">
        <tr>
            <th>No</th>
            <th>File Name</th>
            <th>File Type</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>Actions</th>
        </tr>
        @foreach ($files as $file)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $file->name }}</td>
                <td>{{ $file->type }}</td>
                <td>{{ $file->created_at }}</td>
                <td>{{ $file->updated_at }}</td>
                <td>
                    <form action="{{route('uploads.destroy', $file->id)}}" method="POST">

                        <a href="{{route('uploads.show', $file->id)}}" title="show">
                            <i class="btn btn-success">View</i>
                        </a>

                        <a href="{{route('uploads.edit', $file->id)}}">
                            <i class="btn btn-info">Edit</i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="btn btn-danger">Delete</i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $files->links() !!}

@endsection