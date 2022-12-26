<a href="{{ route('producto', ['product'=> $product->id ]) }}" class="card producto d-block text-dark" style="text-decoration: none;">
    <div class="position-relative" style="border: 1px solid #949494; border-radius:8px; height:265px; display: flex;
    align-items: center;">  
        @if (Storage::disk('custom')->exists($product->image))
            <img src="{{ asset($product->image) }}" class="img-fluid" style="min-height: 167px; max-height:220px; object-fit: cover;">
        @else
            <img src="{{ asset('images/default.jpg') }}" class="img-fluid" style="min-height: 167px; max-height:220px; object-fit: cover;">
        @endif
    </div>
    <div class="card-body ps-0">
        <h2 class="card-text mb-0 font-size-24 mb-3">{{$product->name}}</h2>
        <div class="font-size-18">{!!Str::limit($product->description, 80)!!}</div>
    </div>
</a>