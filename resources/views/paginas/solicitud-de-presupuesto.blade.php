@extends('paginas.partials.app')
@push('head')
    <meta name="url" content="{{ route('index') }}">
@endpush
@section('content')
@includeIf('paginas.partials.head', ['title' => 'Presupuesto'])
<div class="my-5">
    <div class="container">
        <form id="formQuote" action="{{ route('send-quote') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <span class="d-block">{{$error}}</span>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>  
                @endif
                @if (Session::has('mensaje'))
                    <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('mensaje') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>                    
                @endif
                <div class="col-sm-12 table-responsive mb-5">
                    <table id="table"  class="table font-size-14 mb-4 text-center d-none">
                        <thead class="text-capitalize fondo-azul-oscuro color-white">
                            <tr class="">
                                <td class="text-dark" style="background-color: #E3E5E7; border-bottom:none;">Imagen</td>
                                <td class="text-dark" style="background-color: #E3E5E7; border-bottom:none;">Producto</td>
                                <td class="text-dark" style="background-color: #E3E5E7; border-bottom:none;">Sección mm²</td>
                                <td class="text-dark" style="background-color: #E3E5E7; border-bottom:none;">Cantidad</td>
                                <td class="bg-white b-0" style="width: 100px;"></td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <label for="">Nombre y apellido *</label>
                        <input type="text" name="name" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-3">
                    <div class="form-group">
                        <label for="">E- Mail *</label>
                        <input type="text" name="email" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-sm-3">
                    <div class="form-group">
                        <label for="">Teléfono</label>
                        <input type="text" name="phone" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 mb-sm-3">
                    <div class="form-group">
                        <label for="">Empresa</label>
                        <input type="text" name="company" class="form-control font-size-14">
                    </div>
                </div>
                <div class="col-sm-12 mb-sm-3 mb-md-3">
                    <div class="form-group">
                        <label for="">Mensaje *</label>
                        <textarea name="message" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-sm-3 mb-md-5 position-relative">
                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" class="form-control" placeholder="examinar..." style="padding: 0; padding-left: 10px;">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="far fa-folder"></i></div>
                        </div>
                    </div>
                    <input type="file" name="file" class="form-control-file position-absolute" 
                    style="top: 2.5px; left: 15px; width: 100%; cursor: pointer;">
                </div>
            </div>
            <div class="text-end">
                <span class="d-inline-block me-3" style="color:#131313;">* campos obligatorios</span>
                <button type="submit" class="text-uppercase btn text-white font-size-14 py-2 px-5 rounded-pill mb-sm-3 mb-md-0 fondo-azul-claro">cotizar</button>
            </div>
        </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/pages/quote.js?v=1') }}"></script>
    <script>
        let formQoute = document.getElementById('formQuote')
        function clearLocalStore(e){
            e.preventDefault()
            localStorage.removeItem('variableProducts')
            this.submit()   
        }
        formQoute.addEventListener('submit', clearLocalStore)
    </script>
@endpush