@extends('layouts.dash')


@section('content')
    <div class="row" style="margin-left:5px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            <h2>View File</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('uploads.index')}}" title="Go back"> Go back <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    <div class="row" style="margin-left:5px;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>File Name:</strong>
                {{ $file->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>File Type:</strong>
                {{ $file->type }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Created:</strong>
                {{ $file->created_at }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date Updated:</strong>
                {{ $file->updated_at }}
            </div>
        </div>
    </div>
@endsection