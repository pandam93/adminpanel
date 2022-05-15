@extends('adminlte::page')

@section('plugins.Summernote', true)

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('admin.tasks.store') }}" method="POST" enctype= multipart/form-data>
                    @csrf
                    <textarea id="summernote" name="editordata"></textarea>
                  </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
            });
        });
    </script>
@stop