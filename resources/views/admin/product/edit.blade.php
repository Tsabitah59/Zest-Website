@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid margin">
        <div class="card">
            <div class="card-header">
                <h3>
                    <span class="mt-2">Edit Product</span>
                    <a href="{{ route('products-index') }}" class="btn btn-primary text-white float-end">Back</a>
                </h3>
            </div>

            <div class="card-body">
                @if(session('message'))
                <p class="alert alert-success">{{ session('message') }}</p>
                @endif

                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{ route('products-update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">Product Color</button>
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
                                    <option value="{{ $category->id }}" {{$category->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Product Name Filed -->
                            <div class="mt-3">
                                <label for="category">Product Name</label>
                                <input type="text" value="{{ $product->name }}" name="name" class="form-control">
                            </div>

                            <!-- Product Slug Filed -->
                            <div class="mt-3">
                                <label for="category">Product Slug</label>
                                <input type="text" value="{{ $product->slug }}" name="slug" class="form-control">
                            </div>

                            <!-- Brand Filed -->
                            <div class="mt-3">
                                <label for="category">Brand</label>
                                <select name="brand" id="" class="form-control">
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->name }}" {{$brand->name == $product->brand ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Small Desc Filed -->
                            <div class="mt-3">
                                <label for="category">Short Description</label>
                                <textarea name="small_description" id="" cols="30" rows="5" class="form-control">{{ $product->small_description }}</textarea>
                            </div>

                            <!-- Small Desc Filed -->
                            <div class="mt-3">
                                <label for="category">Description</label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control">{{ $product->description }}"</textarea>
                            </div>
                        </div>

                        <!-- SEO Tags -->
                        <div class="tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <!-- Meta Title Filed -->
                            <div class="mt-3">
                                <label for="category">Meta Title</label>
                                <input type="text" value="{{ $product->meta_title }}" name="meta_title" class="form-control">
                            </div>

                            <!-- Meta Description Filed -->
                            <div class="mt-3">
                                <label for="category">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="5">{{ $product->meta_description }}</textarea>
                            </div>

                            <!-- Meta Keyword Filed -->
                            <div class="mt-3">
                                <label for="category">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="5">{{ $product->meta_keyword }}</textarea>
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <!-- Original Price Filed -->
                            <div class="mt-3">
                                <label for="category">Original Price</label>
                                <input type="number" value="{{ $product->original_price }}" name="original_price" class="form-control">
                            </div>

                            <!-- Selling Price Filed -->
                            <div class="mt-3">
                                <label for="category">Selling Price</label>
                                <input type="number" value="{{ $product->selling_price }}" name="selling_price" class="form-control">
                            </div>

                            <!-- Quantity Filed -->
                            <div class="mt-3">
                                <label for="category">Quantity</label>
                                <input type="number" value="{{ $product->quantity }}" name="quantity" class="form-control">
                            </div>

                            <!-- Trending Filed -->
                            <div class="mt-3">
                                <label for="category">Trending</label>
                                <input type="checkbox" {{ $product->trending == '1' ? 'checked' : '' }} name="trending" style="width: 15px; height: 15px;">
                            </div>

                            <!-- Status Filed -->
                            <div class="mt-3">
                                <label for="category">Status</label>
                                <input type="checkbox" {{ $product->status == '1' ? 'checked' : '' }} name="status" style="width: 15px; height: 15px;">
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mt-3">
                                <label for="">Upload Product Image</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>

                            <div class="mt-3">
                                @if($product->productImages)
                                <div class="row">
                                    @foreach($product->productImages as $image)
                                    <div class="col-md-4">
                                        <img src="{{ asset($image->image) }}" alt="" style="width: 80px; height: 80px;   object-fit: cover;" class="me-4">
                                        <a href="{{ route('products-delete-image', $image->id) }}" class="d-block">Remove</a>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <h4>No Image</h4>
                                @endif
                            </div>
                        </div>

                        <!-- Color -->
                        <div class="tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                            <!-- Belum Pernah Ditambahkan -->
                            <div class="mt-3">
                                <h4>Add Product Color</h4>
                                <label for="">Select Color</label>

                                <hr>
                                <div class="row">
                                    <div class="row">
                                        @forelse($colors as $colorItem)
                                        <div class="col-md-3">
                                            <div class="p-2 border mb-3">
                                                Color: <input type="checkbox" name="colors[{{ $colorItem->id }}]" value="{{ $colorItem->id }}"> {{ $colorItem->name }}
                                                <br><br>
                                                Quantity: <input type="number" name="colorquantity[{{ $colorItem->id }}]" id="" style="width: 70px; border:1px solid #DBDBDB; border-radius: 3px;">
                                            </div>
                                        </div>

                                        @empty
                                        <div class="col-md-12">
                                            Not Color Found
                                        </div>
                                        @endforelse
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Color Name</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($product->productColors as $productColor)
                                            <tr class="product-color-tr">
                                                <!-- Name -->
                                                <td>
                                                    @if($productColor->color)
                                                    {{ $productColor->color->name }}
                                                    <!--  -->

                                                    @else
                                                    No Color Found

                                                    @endif
                                                </td>

                                                <!-- Quantity -->
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <input type="text" value="{{ $productColor->quantity }}" class="productColorQuantity form-control form-control-sm" style="width: 1px;">
                                                        <button type="button" value="{{ $productColor->id }}" class="updateProductColorBtn btn btn-primary btn-sm text-white">Update</button>
                                                    </div>

                                                </td>

                                                <!-- Action -->
                                                <td>
                                                    <button type="button" value="{{ $productColor->id }}" class="deleteProductColorBtn btn btn-danger btn-sm text-white">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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

<!-- AJAX -->
@section('scripts')

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Update Quantity
        $(document).on('click', '.updateProductColorBtn', function() {

            // Mendapat ID Produk
            var product_id = "{{ $product->id }}"

            // Mendapai ID Color Product
            var product_color_id = $(this).val();

            // Mendapat Quantity
            var quantity = $(this).closest('.product-color-tr').find('.productColorQuantity').val();

            // if (quantity <= 0) {
            //     alert('quantity is required');
            //     return false;
            // }

            if (quantity <= 0 || isNaN(quantity)) {
                alert('Quantity is required and must be a number greater than 0');
                return false;
            }

            var data = {
                'product_id': product_id,
                'quantity': quantity
            };

            $.ajax({
                type: "POST",
                url: "/admin/product-color/" + product_color_id,
                data: data,
                success: function(response) {
                    alert(response.message);

                }
            })
        });

        // Delete Color
        $(document).on('click', '.deleteProductColorBtn', function() {
            var product_color_id = $(this).val();
            var thisClick = $(this)

            $.ajax({
                type: "GET",
                url: "/admin/product-color/" + product_color_id + "/delete",
                success: function(response) {
                    thisClick.closest('.product-color-tr').remove();
                    alert(response.message)
                }
            })
        })
    })
</script>

@endsection