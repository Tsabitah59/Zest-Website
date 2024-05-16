@extends('layouts.app')

@section('title')
{{ $product->meta_title }}
@endsection

@section('meta_keyword')
{{ $product->meta_keyword }}
@endsection

@section('meta_desctiption')
{{ $product->meta_desctiption }}
@endsection

@section('content')
<div class="">
    <livewire:frontend.product.detail :category="$category" :product="$product">
</div>
@endsection