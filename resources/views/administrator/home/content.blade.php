@extends('adminlte::page')
@section('title', 'Contenido home')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Contenido del home</h1>
        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-create-element">crear Slider</button>
    </div>
@stop
@section('content')
    @include('administrator.partials.mensaje-error')
    @includeIf('administrator.partials.mensaje-exitoso')
    <div class="row mb-5">
        <div class="col-sm-12">
            <h3>Sliders</h3>
            <table id="page_table_slider" class="table">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Imagen</th>
                        <th>Pre título</th>
                        <th>Título</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @isset($section2)
        <form action="{{ route('home.update') }}" method="post" data-sync="no" enctype="multipart/form-data" class="mb-5">
            @csrf
            <input type="hidden" name="id" value="{{$section2->id}}">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        @if (Storage::disk('custom')->exists($section2->image))
                            <img src="{{ asset($section2->image) }}" class="img-fluid d-block mb-3">
                        @endif
                        <small>la imagen debe ser al menos 671x570px</small>
                        <input type="file" name="image" class="form-control-input">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <input type="text" name="content_1" value="{{$section2->content_1}}" placeholder="Título" class="form-control">
                    </div>
                    <div class="form-group">
                        <textarea name="content_2" class="ckeditor">{{$section2->content_2}}</textarea>
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary w-100">Actualiar</button>
            </div>
        </form>
    @endisset
@includeIf('administrator.home.modals.create-slider')
@includeIf('administrator.home.modals.update-slider')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('home.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/home/index.js') }}"></script>
@stop

