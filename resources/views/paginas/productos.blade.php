@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.head', ['title' => 'PRODUCTOS'])
@isset($products)
    <div>
        <div class="container">
            <div class="">
                @if (count($products))
                    <section class="producto row font-size-14 my-5">
                        @foreach ($products as $product)
                            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                @includeIf('paginas.partials.producto', ['product' => $product])
                            </div>                  
                        @endforeach                
                    </section>    
                @else
                    <h2 class="text-center my-5">No tenemos productos cargados en la actualidad</h2>
                @endif
            </div>
        </div>
    </div>
@endisset

@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
