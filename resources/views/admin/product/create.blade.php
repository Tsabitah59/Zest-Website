@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid margin">
        <div class="card">
            <div class="card-header">
                <h3>
                    Product
                    <a href="{{ route('products-index') }}" class="btn btn-danger text-white float-end">back</a>
                </h3>
            </div>
    
            <div class="card-body">
    
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif
    
                <form action="{{ route('products-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                        </li>
                        
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">SEO Tags</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Details</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Product Image</button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors-tab-pane" type="button" role="tab" aria-controls="colors-tab-pane" aria-selected="false">Product Color</button>
                        </li>
                    </ul>
    
                    <div class="tab-content" id="myTabContent">
                        <!-- Home -->
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <!-- Category Filed -->
                            <div class="mt-3">
                                <label for="category">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <!-- Product Name Filed -->
                            <div class="mt-3">
                                <label for="category">Product Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
    
                            <!-- Product Slug Filed -->
                            <div class="mt-3">
                                <label for="category">Product Slug</label>
                                <input type="text" name="slug" class="form-control">
                            </div>
    
                            <!-- Brand Filed -->
                            <div class="mt-3">
                                <label for="category">Brand</label>
                                <select name="brand" id="" class="form-control">
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            <!-- Small Desc Filed -->
                            <div class="mt-3">
                                <label for="category">Short Description</label>
                                <textarea name="small_description" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
    
                            <!-- Small Desc Filed -->
                            <div class="mt-3">
                                <label for="category">Description</label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
    
                        <!-- SEO Tags -->
                        <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <!-- Meta Title Filed -->
                            <div class="mt-3">
                                <label for="category">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control">
                            </div>
    
                            <!-- Meta Description Filed -->
                            <div class="mt-3">
                                <label for="category">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="5"></textarea>
                            </div>
    
                            <!-- Meta Keyword Filed -->
                            <div class="mt-3">
                                <label for="category">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
    
                        <!-- Details -->
                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <!-- Original Price Filed -->
                            <div class="mt-3">
                                <label for="category">Original Price</label>
                                <input type="number" name="original_price" class="form-control">
                            </div>
    
                            <!-- Selling Price Filed -->
                            <div class="mt-3">
                                <label for="category">Selling Price</label>
                                <input type="number" name="selling_price" class="form-control">
                            </div>
    
                            <!-- Quantity Filed -->
                            <div class="mt-3">
                                <label for="category">Quantity</label>
                                <input type="number" name="quantity" class="form-control">
                            </div>
    
                            <!-- Trending Filed -->
                            <div class="mt-3">
                                <label for="category">Trending</label>
                                <input type="checkbox" name="trending" style="width: 15px; height: 15px;">
                            </div>
    
                            <!-- Status Filed -->
                            <div class="mt-3">
                                <label for="category">Status</label>
                                <input type="checkbox" name="status" style="width: 15px; height: 15px;">
                            </div>
                        </div>
    
                        <!-- Image -->
                        <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mt-3">
                                <label for="">Upload Product Image</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                        </div>
    
                        <!-- Colors -->
                        <div class="tab-pane fade" id="colors-tab-pane" role="tabpanel" aria-labelledby="colors-tab" tabindex="0">
                            <div class="mt-3">
                                <label for="">Add Colors</label>
                                <hr>
                                <div class="row">
                                    @forelse($colors as $colorItem)
                                    <div class="col-md-3">
                                        <div class="p-2 border mb-3">
                                            Color : <input type="checkbox" name="colors[{{ $colorItem->id }}]" value="{{ $colorItem->id }}" > {{ $colorItem->name }}
                                            <br>
                                            Quantity : <input type="number" name="colorquantity[{{ $colorItem->id }}]" style="width: 70px; border:1px solid #DBDBDB; border-radius: 3px;">

                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <h4>No Color Found</h4>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
    
                        <button type="submit" class="btn btn-primary text-white mt-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection