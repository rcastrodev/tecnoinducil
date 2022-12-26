@extends('adminlte::page')
@section('title', 'Editar producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('product.content.update') }}" method="post" enctype="multipart/form-data" class="card card-primary">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="card-header">Producto</div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">
        
        <div class="form-group col-sm-12 col-md-8">
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <div class="form-group col-sm-12 col-md-2">
            <input type="text" name="order" value="{{$product->order}}" class="form-control" placeholder="Orden ej AA AB AC">
        </div>
        <div class="form-group col-sm-12 col-md-2 d-flex align-items-center flex-column">
            <label for="">Destacado</label>
            <input type="checkbox" name="outstanding" @if($product->outstanding) checked @endif>
        </div>     
        @if ($product->extra)
            <div class="form-group col-sm-12">
                <a href="{{ route('ficha-tecnica', ['id'=> $product->id]) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">Ficha técnica</a>
                <button class="btn btn-sm rounded-circle btn-danger" id="borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id]) }}">
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>          
        @endif
        <div class="form-group col-sm-12">
            <label>Ficha técnica</label>
            <input type="file" name="extra" class="form-control-file">
        </div>
        <div class="form-group col-sm-12">
            <label for="">Descripción</label>
            <textarea name="description" class="ckeditor" cols="30" rows="10" placeholder="Descripción del producto">{{$product->description}}</textarea>
        </div>
        <div class="form-group col-sm-12">
            <label for="">Aplicación</label>
            <textarea name="application" class="ckeditor" cols="30" rows="10" placeholder="Descripción del producto">{{$product->application}}</textarea>
        </div>
        <div class="form-group col-sm-12">
            <label for="">Caracteristicas</label>
            <textarea name="characteristic" class="ckeditor" cols="30" rows="10" placeholder="Caracteristicas del producto">{{$product->characteristic}}</textarea>
        </div>  
        <div class="form-group col-sm-12 col-md-4 ">
            @if (Storage::disk('custom')->exists($product->image))
                <div class="position-relative">
                    <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyImgProduct" data-url="{{ route('product.image-destroy', ['id'=> $product->id]) }}"></button>
                    <img src="{{ asset($product->image) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>
            @endif
            <label>imagen</label>
            <input type="file" name="image" class="form-control-file">
            <br>
            <small>Tamaño recomendado 480x280px</small>
        </div>   
        @if ($colors->count())    
            <div class="form-group col-sm-12">
                <label for="">Colores</label>
                <select name="colors[]" class="select2 form-control" multiple="multiple">
                    <option value="-1">Todos</option>
                    @foreach ($colors as $color)
                        <option 
                        value="{{$color->id}}"
                        @if(in_array($color->id, $product->colors->pluck('id')->toArray(), true)) selected @endif
                        >{{$color->name}}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if ($products->count())    
            <div class="form-group col-sm-12">
                <label for="">Productos relacionados</label>
                <select name="products[]" class="select2 form-control" multiple="multiple">
                    @foreach ($products as $p)
                        <option 
                            value="{{$p->id}}"
                            @if(in_array($p->id, $product->relatedProducts->pluck('id')->toArray(), true)) selected @endif
                        >{{$p->name}}</option>
                    @endforeach
                </select>
            </div>
        @endif

        <div class="form-group col-sm-12">
            <label for="">Tabla</label>
            <textarea name="table" class="ckeditor" cols="30" rows="10" placeholder="Tabla">{{ $product->table }}</textarea>
        </div>
    </div>
      <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/product/variable-product.js') }}"></script>
    <script>
        // borrar ficha técnica 
        let borrarFicha = document.getElementById('borrarFicha')
        if (borrarFicha) {
            borrarFicha.addEventListener('click', function(e){
                e.preventDefault()
                axios.delete(this.dataset.url)
                .then(r => {
                    this.closest('div').remove()
                })
                .catch(e => console.error( new Error(e) ))      
            })  
        }
    </script>
@stop

