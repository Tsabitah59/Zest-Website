@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid margin">
        <div class="card">
            <div class="card-header">
                <h3 class=" d-flex justify-content-between align-items-center">
                    Product
                    <a href="{{ route('products-create') }}" class="btn btn-primary text-white float-end">Add Product </a>
                </h3>
            </div>
    
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->status == '1' ? 'Hidden' : 'Visible' }}</td>
                            <td>
                            <a href="{{ route('products-edit', ['id' => $product->id]) }}" class="btn btn-sm btn-success text-white">Edit</a>                            
                            <a href="{{ route('products-delete', ['id' => $product->id]) }}" class="btn btn-sm btn-danger text-white">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>No Pruduct Here!</td>
                        </tr>
    
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection