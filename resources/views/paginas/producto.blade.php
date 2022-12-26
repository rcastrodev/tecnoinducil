    @extends('paginas.partials.app')
    @section('content')
    <div class="contenedor-breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb py-2 font-size-13">
                    <li class="breadcrumb-item">
                        <a href="{{ route('index') }}" class="text-dark text-decoration-none">Inicio</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('productos') }}" class="text-dark text-decoration-none">Productos</a>              
                    </li>
                    <li class="breadcrumb-item active text-dark" aria-current="page">{{ $product->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row">
                <aside class="col-sm-12 col-md-3 d-sm-none d-lg-block">
                    <form action="{{ route('productos') }}" method="get">
                        <div class="input-group mb-3">
                            <span class="input-group-text bg-transparent"><i class="fal fa-search"></i></span>
                            <input type="seach" name="search" class="form-control" style="border-left: 0;" placeholder="Buscar por producto" aria-describedby="basic-addon1">
                        </div>
                    </form>
                    <span class="d-block mb-3 font-size-14" style="color: #8C8C8C;">PRODUCTOS</span>
                    <ul class="p-0" style="list-style: none;">
                        @foreach ($products as $p)
                            <li class="py-2 ps-3"> 
                                <a href="{{ route('producto', ['product' => $p->id]) }}" class="text-decoration-none">{{$p->name}}</a>
                            </li>                        
                        @endforeach
                    </ul>
                </aside>
                <section class="producto col-sm-12 col-lg-9">
                    <div class="row mb-5">
                        <div class="col-sm-12 col-md-6">
                            @if (Storage::disk('custom')->exists($product->image))
                                <div class="d-flex align-items-center" style="height: 400px; border:1px solid #DFDFDF; border: 1px solid #DFDFDF; border-radius: 8px;">
                                    <img src="{{ asset($product->image) }}" class="img-fluid mb-4" style="object-fit: cover;" id="imageCurrent">
                                </div>
                            @else
                                <div class="d-flex align-items-center" style="height: 400px; border:1px solid #DFDFDF; border: 1px solid #DFDFDF; border-radius: 8px;">
                                    <img src="{{ asset('images/default.jpg') }}" class="w-100 img-fluid mb-4" style="object-fit: cover;">
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-12 col-md-6 mb-5">
                            <div class="col-sm-12">
                                <h1 class="mb-3 font-size-40" style="font-weight: 600;"> {{ $product->name }}</h1>
                                @if ($product->description)
                                    <div class="div mb-3 font-size-20" style="color: #545454;">{!! $product->description !!}</div>
                                    <hr class="mb-3">
                                @endif
                                @if ($product->application)
                                    <div class="div mb-4">
                                        <strong class="font-size-16">Aplicaciones</strong>
                                        <div class="font-size-16">{!! $product->application !!}</div>
                                    </div>
                                @endif
                                @if (count($product->colors))
                                    <div class="div mb-sm-3 mb-lg-5">
                                        <strong class="d-block mb-3 font-size-16">Colores</strong>
                                        <ul class="d-flex flex-wrap p-0" style="list-style: none;">
                                            @foreach($product->colors as $colorProduct)
                                            <li class="me-2">
                                                <div style="background-color: {{ $colorProduct->exa }}; height:20px; width:20px; border-radius:100%;"></div>
                                            </li>                                        
                                            @endforeach
                                        </ul>
                                    </div>  
                                @endif
                                @if (Storage::disk('custom')->exists($product->extra))
                                    <a href="{{ route('ficha-tecnica', ['id'=> $product->id]) }}" class="btn fw-bold py-2 px-5 rounded-pill font-size-14 w-100" style="border: 1px solid #0192DE;">Descargar ficha técnica</a>
                                @endif
                            </div>
                        </div>
                        @if ($product->characteristic)
                            <div class="col-sm-12">
                                <h3 class="mb-4 font-size-24">Caracteristicas</h3>
                                <div class="d-flex justify-content-between Caracteristicas flex-wrap font-size-16">{!! $product->characteristic !!}</div>
                            </div>
                        @endif
                    </div>
                </section>
                <div class="row mb-5">
                    @if ($product->table)
                        <div class="col-sm-12 table-responsive table-r">
                            {!! $product->table !!}
                        </div>
                    @endif
                    @if (count($product->relatedProducts))
                    <div class="col-sm-12">
                        <div class="row">
                            <h5 class="col-sm-12 mb-4 font-size-24">Productos relacionados</h5>
                            @foreach ($product->relatedProducts as $relatedProducts)
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    @includeIf('paginas.partials.producto', ['product' => $relatedProducts])
                                </div>  
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>                    
            </div>
        </div>
    </div>
    @endsection
    @push('head')
        <style>
            .table-r table{
                border: none !important;
                table-layout: fixed;
                width: 100%;
                text-align: center;
            }

            .table-r table td, .table-r table th{
                padding: 5px;
                vertical-align: initial;
            }

            .table-r table input{
                background-color: transparent;
                padding: 5px 20px;
                border: 1px solid #0192DE;
                border-radius: 20px;
            }

            @media(min-width:992px) {
                .Caracteristicas p{
                    width: 50%;
                }
            }

        </style>
    @endpush
    @push('scripts')
        <script src="{{ asset('js/pages/product.js?v=1') }}"></script>
    @endpush
