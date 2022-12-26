@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.head', ['title' => 'Empresa'])
<div id="section1" class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-lg-6">
				<h3 class="font-size-32 mb-4" style="font-weight: 600;">{{ $section1->content_1 }}</h3>
				<div class="font-size-16">{!! $section1->content_2 !!}</div>
			</div>
			@if (Storage::disk('custom')->exists($section1->image))
				<div class="col-sm-12 col-lg-6">
					<img src="{{ asset($section1->image) }}" class="img-fluid w-100" style="object-fit: cover;">
				</div>
			@endif
		</div>
	</div>
</div>
@isset($section2s)
	@if (count($section2s))
		<div id="section2-empresa" class="py-5" style="background-color: #F4F4F4;">
			<div class="container">
				<div class="row">
					@foreach ($section2s as $s2)
						<div class="col-sm-12 col-md-6 col-lg-4 mb-4">
							<div class="bg-white px-4 py-3" style="min-height: 400px;">
								<div class="">
									@if (Storage::disk('custom')->exists($s2->image))
										<img src="{{ asset($s2->image) }}" class="img-fluid d-block mb-3" style="height: 55px;">
									@endif
									<div class="">
										<h3 class="font-size-20 mb-3">{{ $s2->content_1 }}</h3>
										<div class="font-size-16">{!! $s2->content_2 !!}</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	@endif
@endisset
@endsection