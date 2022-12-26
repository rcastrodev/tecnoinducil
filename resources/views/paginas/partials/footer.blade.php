<footer class="py-sm-2 py-md-5 font-size-14 text-sm-center text-md-start">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-3 d-sm-none d-lg-block">
                <img src="{{ asset($data->logo_footer) }}" alt="" class="d-block ml-0">
            </div>
            <div class="col-sm-12 col-md-4 d-sm-none d-lg-block">    
                <div class="row">
                    <div class="col-m-12 mb-4">
                        <h6 class="text-uppercase color-azul-claro font-size-18">secciones</h6>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('index') }}" class="d-block text-decoration-none text-dark font-size-16 underline">Inicio</a>
                        <a href="{{ route('productos') }}" class="d-block text-decoration-none text-dark font-size-16 underline">Productos</a>
                        <a href="{{ route('descargas') }}" class="d-block text-decoration-none text-dark font-size-16 underline">Descargas</a>
                        <a href="{{ route('contacto') }}" class="d-block text-decoration-none text-dark font-size-16 underline">Contacto</a>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <a href="{{ route('empresa') }}" class="d-block text-decoration-none text-dark font-size-16 underline">Empresa</a>
                        <a href="{{ route('calidad') }}" class="d-block text-decoration-none text-dark font-size-16 underline">Calidad</a>                                
                        <a href="{{ route('presupuesto') }}" class="d-block text-decoration-none text-dark font-size-16 underline">Presupuesto</a>   
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 font-size-13 mb-sm-4 mb-md-0 text-sm-start">
                <div class="row">
                    <h6 class="text-uppercase color-azul-claro font-size-18 mb-4">contacto</h6>
                    <div class="d-flex font-size-16 mb-3">
                        <i class="fas fa-map-marker-alt color-azul-claro d-block me-2"></i>
                        <div class="">
                            <span class="d-block"> {{ $data->address }}</span>
                            <span class="d-block" style="color:#909090;">Deposito y ventas</span>
                        </div>
                    </div>
                    <div class="d-flex font-size-16 mb-3">
                        <i class="fas fa-map-marker-alt color-azul-claro d-block me-2"></i>
                        <div class="">
                            <span class="d-block"> {{ $data->address2 }}</span>
                            <span class="d-block" style="color:#909090;">Planta industrial</span>
                        </div>
                    </div>
                    <div class="d-flex font-size-16 mb-3 align-items-center">
                        <i class="fas fa-envelope color-azul-claro d-block me-2"></i><span class="d-block"></span>
                        <a href="mailto:{{ $data->email }}" class="underline" style="color: #212529; text-decoration: none;">{{ $data->email }}</a>             
                    </div>
                    <div class="d-flex font-size-16 mb-3 align-items-center">
                        <i class="fas fa-phone-alt color-azul-claro d-block me-2"></i>
                        @if ($data->phone1)
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                            @if(count($phone) == 2)
                                <a href="tel:{{$phone[0]}}" class="text-decoration-none underline fw-white font-size-14 underline" style="color: #212529;">{{ $phone[1] }}</a>
                            @else
                                <a href="tel:{{ $data->phone1 }}" class="text-decoration-none underline fw-white font-size-14 underline" style="color: #212529;">{{ $data->phone1 }}</a> 
                            @endif       
                        @endif
                    </div>
                    <div class="d-flex font-size-16 mb-3 align-items-center">
                        <i class="fas fa-phone-alt color-azul-claro d-block me-2"></i>
                        @if ($data->phone2)
                            @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                            @if(count($phone2) == 2)
                                <a href="tel:{{$phone2[0]}}" class="text-decoration-none underline fw-white font-size-14 underline" style="color: #212529;">{{ $phone2[1] }}</a>
                            @else
                                <a href="tel:{{ $data->phone2 }}" class="text-decoration-none underline fw-white font-size-14 underline" style="color: #212529;">{{ $data->phone2 }}</a> 
                            @endif       
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="fondo-azul-claro color-white p-2 font-size-13">
    <div class="container">
        <div class="row">
            <div class="col">
                <span>© Copyright 2021 Hilos Libertad. Todos los derechos reservados</span>
            </div>
        </div>
    </div>
</div>