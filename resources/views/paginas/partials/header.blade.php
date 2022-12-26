<div class="fixed-top">
    <header class="header fondo-azul-claro py-2 d-sm-none d-md-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12 col-md-7 col-xxl-6 d-flex flex-wrap">
                            @if ($data->phone1)
                                @php $phone = Str::of($data->phone1)->explode('|') @endphp
                                <div class="d-flex align-items-center me-3">
                                    <i class="fal fa-phone text-white d-block me-2 font-size-14"></i>
                                    @if(count($phone) == 2)
                                        <a href="tel:{{$phone[0]}}" class="text-white text-decoration-none underline fw-white font-size-14">{{ $phone[1] }}</a>
                                    @else
                                        <a href="tel:{{ $data->phone1 }}" class="text-white text-decoration-none underline fw-white font-size-14">{{ $data->tel }}</a> 
                                    @endif
                                </div>          
                            @endif
                            <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 font-size-14 underline">
                                <i class="fas fa-envelope"></i> {{ $data->email }}
                            </a>
                        </div>
                        <div class="col-sm-12 col-md-5 d-flex justify-content-end"> 
                            <a href="{{ route('productos') }}" class="px-2"><i class="far fa-search"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white" style="box-shadow: 0px 3px 6px #00000029;">
        <div class="container">
            <a class="navbar-brand" href="{{ route('index') }}">
                <img src="{{ asset($data->logo_header) }}" alt="" class="img-fluid logo-header">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end text-uppercase" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item @if(Request::is('/')) position-relative @endif">
                        <a class="nav-link @if(Request::is('/')) active @endif" href="{{ route('index') }}">inicio</a>
                    </li>
                    <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                        <a class="nav-link @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                    </li>
                    <li class="nav-item @if(Request::is('productos') or Request::is('producto/*')) position-relative @endif">
                        <a class="nav-link @if(Request::is('productos') or Request::is('producto/*')) active @endif" href="{{ route('productos') }}" >productos</a>
                    </li>
                    <li class="nav-item @if(Request::is('calidad')) position-relative @endif">
                        <a class="nav-link @if(Request::is('calidad')) active @endif" href="{{ route('calidad') }}" >calidad</a>
                    </li>
                    <li class="nav-item @if(Request::is('descargas')) position-relative @endif">
                        <a class="nav-link @if(Request::is('descargas')) active @endif" href="{{ route('descargas') }}" >descargas</a>
                    </li>
                    <li class="nav-item @if(Request::is('presupuesto')) position-relative @endif">
                        <a class="nav-link @if(Request::is('presupuesto')) active @endif" href="{{ route('presupuesto') }}" >presupuesto</a>
                    </li>
                    <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                        <a class="nav-link @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>      
</div>
<div class="m-top"></div>
