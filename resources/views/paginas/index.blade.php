@extends('paginas.partials.app')
@section('content')
@if(count($section1s))
	<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			@foreach ($section1s as $k => $item)
				<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
			@endforeach
		</div>
		<div class="carousel-inner" style="box-shadow: -1px -1px 14px #00000014;">
			@foreach ($section1s as $key => $slider)
				<div class="carousel-item @if(!$key) active @endif" style="background-image: url({{$slider->image}}); background-repeat: no-repeat; background-size: cover; background-position: center;">
					<div class="container mx-auto contentHero">
						<div class="mt-sm-2 text-start text-white" style="max-width: 500px !important;">
							<h1 class="font-size-40 hero-content-slider mb-sm-2 mb-md-4 mt-sm-5 mt-lg-0" style="font-weight: 700">{{ $slider->content_1 }}</h1>
							<p class="hero-content-slider font-size-16 mb-4 fw-light" style="color: #F5F5F5; font-weight: 400px;">{{ $slider->content_2 }}</p>
							<a href="{{ route('productos') }}" class="btn text-white py-2 px-4 rounded-pill fondo-azul-claro font-size-16">Ver productos</a>
						</div>
					</div>
				</div>			
			@endforeach
		</div>	
	</div>	
@endif
@isset($products)
	@if (count($products))
		<div class="py-5">
			<div class="container">
				<div class="row">
					<h2 class="col-sm-12 col-lg-6 font-size-32 text-uppercase" style="font-weight: 600;">productos</h2>
					<div class="col-sm-12 col-lg-6 d-sm-none d-lg-block text-end">
						<a href="{{ route('productos') }}" class="btn py-2 px-4 rounded-pill font-size-16" style="border: 1px solid #0192DE;font-weight: 500;">Ver todos</a>
					</div>
				</div>
				<section class="producto row my-5">
					@foreach ($products as $product)
						<div class="col-sm-12 col-lg-4 mb-4">
							@includeIf('paginas.partials.producto', ['product' => $product])
						</div>                  
					@endforeach                
				</section>   
			</div>
		</div>
	@endif
@endisset
@if ($section2)
	<section id="section2" class="mb-5">
		<div class="row">
			<div class="col-sm-12 col-lg-6 pe-0">
				<img src="{{ asset($section2->image) }}" alt="" class="img-fluid w-100">
			</div>
			<div class="ps-0 col-sm-12 col-lg-6 text-start bg-light d-flex align-items-center justify-content-center py-sm-4 py-lg-0">
				<div class="" style="width: 400px">
					<h3 class="font-size-32 mb-4 text-uppercase">{{ $section2->content_1 }}</h3>
					<div class="mb-5 font-size-16" style="font-weight: 400;">{!! $section2->content_2 !!}</div>
					<a href="{{ route('productos') }}" class="btn fondo-azul-claro text-white py-2 px-4 rounded-pill">Ver productos</a>
				</div>
			</div>
		</div>
	</section>	
@endif
@endsection
@push('head')
	<style>
		.carousel-caption{
			max-width: 60% !important;
		}
		#sliderHero, #sliderHero .carousel-inner, #sliderHero .carousel-inner .carousel-item, #sliderHero img{
				height: 500px;
			}
		@media(min-width:992px){
			.carousel-caption h2{
				font-size: 42px;
			}

		}
		@media(max-width:992px){
			.carousel-caption h2{
				font-size: 22px;
			}
		}

	</style>
@endpush