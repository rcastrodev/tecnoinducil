@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.head', ['title' => 'Calidad'])
<div id="section1" class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-6">
				<h3 class="font-size-28 mb-4" style="font-weight: 600;">{{ $section1->content_1 }}</h3>
				<div class="font-size-16">{!! $section1->content_2 !!}</div>
			</div>
			<div class="col-sm-12 col-md-6">
				@if (Storage::disk('custom')->exists($section1->image))
					<img src="{{ asset($section1->image) }}" alt="" class="img-fluid w-100">
				@endif
			</div>
		</div>
	</div>
</div>
@endsection