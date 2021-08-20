
<div class="card">

    <div id="carousel{{ $product->id }}" class="carousel slide carousel-fade">
        <div class="carousel-inner">
            @foreach($product->images as $image)
            <div class="carousel-item {{ $loop->first ?  'active' : '' }}" >    

                <div style="background-size: cover; background-position: center;height: 20rem; background-image: url('{{ asset($image->path) }}');"></div>

            </div>
            @endforeach
        </div>
    </div>

    <a class="carousel-control-prev" href="#carousel{{ $product->id }}"
    role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>

    <a class="carousel-control-next" href="#carousel{{ $product->id }}"
    role="button" data-slide="next"><span class="carousel-control-next-icon"></span></a>

<div class="card-body">
    <h4 class="text-right"><strong>$ {{ $product->price }} </strong></h4>
    <h5 class="card-title"> {{ $product->title }} </h5>
    <p class="card-text">{{ $product->description }}</p>
    <h5 class="card-text">In Stock: {{ $product->stock }}</h5>

    @if(isset($cart))
    <p class="card-text">{{ $product->pivot->quantity }} in your cart: <strong>$ {{ $product->total }}</strong></p>
    
    <form action="{{route('products.carts.destroy', ['cart' => $cart->id, 'product' => $product->id])}}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-warning">Remove from Cart</button>
    </form>

    @else
    <form action="{{route('products.carts.store', ['product' => $product->id])}}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-success">Add To Cart</button>
    </form>
    @endif
    </div>
</div>
