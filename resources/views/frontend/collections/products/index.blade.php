@extends('layouts.app')

@section('title')
{{ $category->meta_title }}
@endsection

@section('meta_keyword')
{{ $category->meta_keyword }}
@endsection

@section('meta_desctiption')
{{ $category->meta_desctiption }}
@endsection

@section('content')
<div class="py-3 py-md-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Our Special Products</h4>
            </div>
        </div>

        <livewire:frontend.product.index :category="$category">

    </div>
</div>
@endsection