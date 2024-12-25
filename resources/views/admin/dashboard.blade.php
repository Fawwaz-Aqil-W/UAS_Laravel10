@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Admin Dashboard</h2>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Products</h5>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New Product</a>
                </div>
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
    </div>
</div>
@endsection