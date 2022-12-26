@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido de empresa</h1>
    </div>
@stop
@section('content')
@include('administrator.partials.mensaje-error')
@includeIf('administrator.partials.mensaje-exitoso')
@isset($section1)
    <form action="{{ route('company.content.updateInfo') }}" method="post" data-sync="no" enctype="multipart/form-data" class="mb-5">
        @csrf
        <input type="hidden" name="id" value="{{$section1->id}}">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="content_1" value="{{$section1->content_1}}" placeholder="Título" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content_2" class="ckeditor">{{$section1->content_2}}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    @if (Storage::disk('custom')->exists($section1->image))
                        <img src="{{ asset($section1->image) }}" class="img-fluid d-block mb-3">
                    @endif
                    <small>la imagen debe ser al menos 671x570px</small>
                    <input type="file" name="image" class="form-control-input">
                </div>
            </div>
        </div>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary w-100">Actualiar</button>
        </div>
    </form>
@endisset
<div class="row mb-5">
    <div class="col-sm-12">
        <div class="d-flex mb-3">
            <h3 class="mr-2">Sliders</h3>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear</button>
        </div>
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Orden</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.company.modals.create-slider')
@includeIf('administrator.company.modals.update-slider')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js') }}"></script>
@stop

