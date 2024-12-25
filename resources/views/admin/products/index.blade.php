@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Products Management</h2>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New Product</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Harga</th>
                        <th>Sale Price</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>
                            @if($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 50px">
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>Rp{{ number_format($product->price) }}</td>
                        <td>
                            @if($product->sale_price)
                                Rp{{ number_format($product->sale_price) }}
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ ucfirst($product->category) }}</td>
                        <td>
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection