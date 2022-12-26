@extends('adminlte::page')
@section('title', 'Crear producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<div class="card card-primary">
    <div class="card-header"></div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('product.content.store') }}" method="post" enctype="multipart/form-data">
        <div class="card-body row">
            @csrf
            <div class="form-group col-sm-12 col-md-8">
                <label for="">Nombre del producto</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nombre del producto">
            </div>
            <div class="form-group col-sm-12 col-md-2">
                <label for="">Orden</label>
                <input type="text" name="order" value="{{old('order')}}" class="form-control" placeholder="Ej AA AB AC">
            </div>   
            <div class="form-group col-sm-12 col-md-2 d-flex align-items-center flex-column">
                <label for="">Destacado</label>
                <input type="checkbox" name="outstanding" @if(old('outstanding')) checked @endif>
            </div> 
            <div class="form-group col-sm-12">
                <label>Ficha técnica</label>
                <input type="file" name="extra" class="form-control-file">
            </div>      
            <div class="form-group col-sm-12">
                <label for="">Descripción</label>
                <textarea name="description" class="ckeditor" cols="30" rows="10" placeholder="Descripción del producto">{{old('description')}}</textarea>
            </div>
            <div class="form-group col-sm-12">
                <label for="">Aplicación</label>
                <textarea name="application" class="ckeditor" cols="30" rows="10" placeholder="Aplicaciones del producto">{{old('application')}}</textarea>
            </div>
            <div class="form-group col-sm-12">
                <label for="">Caracteristicas</label>
                <textarea name="characteristic" class="ckeditor" cols="30" rows="10" placeholder="Caracteristicas del producto">{{old('characteristic')}}</textarea>
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label>imagen</label>
                <input type="file" name="image" class="form-control-file">
                <br>
                <small>Tamaño recomendado 480x280px</small>
            </div> 
            @if (count($colors))
                <div class="form-group col-sm-12 mt-4">
                    <label for="">Colores</label>
                    <select name="colors[]" class="select2 form-control" multiple="multiple">
                        @foreach ($colors as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
                        @endforeach
                    </select>
                </div>   
            @endif

            @if (count($products))
                <div class="form-group col-sm-12 mt-4">
                    <label for="">Productos</label>
                    <select name="products[]" class="select2 form-control" multiple="multiple">
                        @foreach ($products as $p)
                            <option value="{{$p->id}}">{{$p->name}}</option>
                        @endforeach
                    </select>
                </div>
            @endif
            <div class="form-group col-sm-12">
                <label for="">Tabla</label>
                <textarea name="table" class="ckeditor" cols="30" rows="10" placeholder="Tabla">{{old('table')}}</textarea>
            </div>

        </div>
      <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>

@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('document').ready(function(){
            $('.select2').select2()
        })
    </script>
@stop

