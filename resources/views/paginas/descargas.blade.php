@extends('paginas.partials.app')
@section('content')
	@includeIf('paginas.partials.head', ['title' => 'Empresa'])
	@isset($section1s)
		@if (count($section1s))
			<div id="section1-descargas" class="py-5">
				<div class="container">
					@foreach ($section1s as $s1)
						<div class="row mb-sm-5 mb-lg-4 py-sm-3 py-lg-0">
							<div class="col-sm-12 col-md-5 d-sm-none d-md-block" style="background-image: url({{ asset($s1->image) }})"></div>
							<div class="col-sm-12 col-md-7 d-flex flex-column justify-content-center">
								<div class="ps-4" style="max-width: 400px">
									<h2 class="mb-3 font-size-24" style="font-weight: 600;">{{ $s1->content_1 }}</h2>
									<div class="font-size-16 mb-4">{!! $s1->content_2 !!}</div>
									@if (Storage::disk('custom')->exists($s1->image))
										<a href="{{ route('descargar-archivo', ['id'=> $s1->id, 'reg' => 'image']) }}" class="text-center fondo-azul-claro btn text-white py-2 px-5 rounded-pill">
											<i class="fas fa-download d-inline-block me-2"></i>
											Descargar
										</a>
									@endif
									
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endif
	@endisset
@endsection
@push('head')
	<style>
		#section1-descargas .row{
			background-color: #F4F4F4;
		}

		@media(min-width:992px){
			#section1-descargas .row{
				min-height: 340px;
				border-radius: 0px 8px 8px 0px;
			}
		}
	</style>
@endpush
