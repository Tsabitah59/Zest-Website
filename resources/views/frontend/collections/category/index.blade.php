@extends('layouts.app')

@section('title', 'All Categories')
@section('content')

<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Categories</h4>
            </div>

            @forelse($categories as $category)
            
            <div class="col-6 col-md-3">
                <div class="category-card">
                    <a href="{{ route('products-category', $category->slug) }}">
                        <div class="category-card-img" style="height: 1000px;">
                            <img src="{{ asset('upload/category/'.$category->image) }}" class="w-100 h-100" alt="Category Image" style="object-fit: cover;">
                        </div>
                        <div class="category-card-body">
                            <h5>{{ $category->name }}</h5>
                        </div>
                    </a>
                </div>
            </div>

            @empty
            
            <div class="col-md-12">
                <h5>No Categories Available</h5>
            </div>

            @endforelse
        </div>
    </div>
</div>

@endsection