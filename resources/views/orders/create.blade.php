@extends('layouts.app')

@section('content')

<h1>Order details</h1>

<h4 class="text-center"><strong>Grand Total: <strong> {{ $cart->total }} </strong></strong></h4>
 
<div class="text-center mb-3">
<form action="{{route('orders.store')}}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-success">Confirm Order</button>
</form>
</div>

<div class='table-responsive'>
    <table clss='table table-striped'>
        <thead class='thead-light'>
            <tr>
              <th>Product</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
            </tr>
        </thead>
        <tbody>

        @foreach($cart->products as $product)
              <tr>
              <td> 
              <div style="background-size: cover; background-position: center;height: 5rem;width: 5rem; background-image: url('{{ asset($product->images->first()->path) }}');"></div>
                  {{$product->title }}
              </td>
              <td> {{$product->price }}</td>
              <td> {{$product->description }}</td>
              <td> {{$product->pivot->quantity }}</td>
              <td>
                  <strong>
                      ${{ $product->total }}
                  </strong>
              </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
