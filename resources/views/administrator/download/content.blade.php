@extends('adminlte::page')
@section('title', 'Descargas')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Descargas</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button>
    </div>
@stop
@section('content')
@include('administrator.partials.mensaje-error')
@includeIf('administrator.partials.mensaje-exitoso')
<table id="page_table_slider" class="table">
    <thead>
        <tr>
            <th>Orden</th>
            <th>Título</th>
            <th>Contenido</th>
            <th>Acciones</th>
        </tr>
    </thead>
</table>
@includeIf('administrator.download.modals.create-slider')
@includeIf('administrator.download.modals.update-slider')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('download.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/download/index.js') }}"></script>
@stop

