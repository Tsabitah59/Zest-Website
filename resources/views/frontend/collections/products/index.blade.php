@extends('layouts.app')

@section('title', 'All Categories')
@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Special Products</h4>
            </div>
        </div>

        <div class="row">
            @forelse($products as $product)
            <div class="col-md-4">
                <div class="product-card">
                    <div class="product-card-img">
                        <label class="stock bg-success">In Stock</label>
                        <img src="{{ asset($product->productImages[0]->image) }}" alt="Laptop">
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{ $product->brand }}</p>
                        <h5 class="product-name">
                            <a href="">
                                {{ $product->name }}
                            </a>
                        </h5>
                        <div>
                            <span class="selling-price">$500</span>
                            <span class="original-price">$799</span>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1">Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> </a>
                            <a href="" class="btn btn1"> View </a>
                        </div>
                    </div>
                </div>
            </div>
            @empty

            <div class="col-md-12">
                <h4>No Product For {{ $category->name }} Category</h4>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection