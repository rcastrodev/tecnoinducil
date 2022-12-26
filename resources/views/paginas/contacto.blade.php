@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.head', ['title' => 'Contacto'])
<div class="my-5">
    <div class="container">
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
        <form action="{{ route('send-contact') }}" method="post" class="mb-5">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-lg-4 font-size-14">
                    <p>Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.</p>
                    <div class="d-flex mb-3">
                        <i class="fas fa-map-marker-alt color-azul-claro d-block me-2 mt-1"></i>
                        <div class="">
                            <span class="d-block"> {{ $data->address }}</span>
                            <span class="d-block" style="color:#909090;">Deposito y ventas</span>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-map-marker-alt color-azul-claro d-block me-2 mt-1"></i>
                        <div class="">
                            <span class="d-block"> {{ $data->address2 }}</span>
                            <span class="d-block" style="color:#909090;">Planta industrial</span>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-envelope color-azul-claro d-block me-2 mt-1"></i>
                        <a href="mailto:{{ $data->email }}" class="text-dark text-decoration-none underline">{{ $data->email }}</a>                   
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-phone-alt color-azul-claro d-block me-2 mt-1"></i>
                        @if ($data->phone1)
                            @php $phone = Str::of($data->phone1)->explode('|') @endphp
                            @if(count($phone) == 2)
                                <a href="tel:{{$phone[0]}}" class="text-dark text-decoration-none underline">{{ $phone[1] }}</a>
                            @else
                                <a href="tel:{{ $data->phone1 }}" class="text-dark text-decoration-none underline">{{ $data->phone1 }}</a> 
                            @endif       
                        @endif
                    </div>
                    <div class="d-flex mb-3">
                        <i class="fas fa-phone-alt color-azul-claro d-block me-2 mt-1"></i>
                        @if ($data->phone2)
                            @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                            @if(count($phone2) == 2)
                                <a href="tel:{{$phone2[0]}}" class="text-dark text-decoration-none underline">{{ $phone2[1] }}</a>
                            @else
                                <a href="tel:{{ $data->phone2 }}" class="text-dark text-decoration-none underline">{{ $data->phone2 }}</a> 
                            @endif       
                        @endif
                    </div>
                </div>               
                <div class="col-sm-12 col-lg-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">Nombre y Apellido *</label>
                                <input type="text" name="nombre" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label for="">E-Mail *</label>
                                <input type="email" name="email" class="form-control font-size-14">
                                
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="tel" name="telefono" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <label for="">Empresa</label>
                                <input type="text" name="empresa" class="form-control font-size-14">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label for="">Mensaje *</label>
                                <textarea name="mensaje" class="form-control font-size-14" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group">
                                <label for="" style="visibility: hidden">robot</label>
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3 text-end">
                            <span class="d-inline-block me-3" style="color:#131313;">* campos obligatorios</span>
                            <button type="submit" class="text-uppercase btn fondo-azul-claro font-size-14 py-2 px-5 rounded-pill font-weight-600 mb-sm-3 mb-md-0 text-white">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-sm-12 col-lg-6 mb-2">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3266.7873744377293!2d-58.7562229!3d-35.03704880000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bd1f993e22570f%3A0x9d6a7d637a61cc9a!2sTecno%20Indusil!5e0!3m2!1ses!2sve!4v1665670968413!5m2!1ses!2sve" height="500" style="border:0; width:100%;" allowfullscreen="" loading="lazy" class="mb-2"></iframe>
                <span style="color:#909090;">Planta Industrial</span>
            </div>
            <div class="col-sm-12 col-lg-6 mb-2">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13126.68376531936!2d-58.5124918!3d-34.6630123!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xae856d700729ef2b!2sTecno%20Indusil%20Sa!5e0!3m2!1ses!2sve!4v1665670877144!5m2!1ses!2sve" height="500" style="border:0; width:100%;" allowfullscreen="" loading="lazy" class="mb-2"></iframe>
                <span style="color:#909090;">Deposito y ventas</span>
            </div>
        </div>

    </div>
</div>
@endsection