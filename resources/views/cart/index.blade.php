@extends('layouts.app')

@section('content')
<div class="container px-4 px-lg-5 mt-5">
    <h2>Shopping Cart</h2>
    
    @if($cartItems->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp{{ number_format($item->product->price) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rp{{ number_format($item->product->price * $item->quantity) }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end fw-bold">Total:</td>
                        <td>Rp{{ number_format($cartItems->sum(function($item) { 
                            return $item->product->price * $item->quantity;
                        })) }}</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>
            
            <div class="text-end mt-3">
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Checkout</button>
                </form>
            </div>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection