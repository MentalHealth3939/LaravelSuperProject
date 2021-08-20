@extends('layouts.app')

@section('content')

<h1>Payments details</h1>

<h4 class="text-center"><strong>Grand Total: <strong> {{ $order->total }} </strong></strong></h4>
 
<div class="text-center mb-3">
<form action="{{route('orders.payments.store', ['order' => $order->id])}}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-success">Pay</button>
</form>
</div>

@endsection
