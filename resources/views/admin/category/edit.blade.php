@extends('layouts.admin')

@section('content')
<!-- Ini adalah konten yang bisa berubah -->

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Edit Category</h3>
            </div>

            <div class="card-body">
                <form action="{{ route('category-update', $category->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="">Slug</label>
                            <input type="text" name="slug" class="form-control"  value="{{ $category->slug }}">
                            @error('slug')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="col-6 mb-3">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                            @error('description')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <div class="col-6 mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('/upload/category/'.$category->image) }}" alt="" width="70px" height="70px">
                            @error('image')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-6 mb-3">
                            <label for="">Status</label>
                            <input type="checkbox" name="status" {{$category->status == '1' ? 'checked' : ''}}>
                        </div>
                    </div>

                    <div class="col md-12 mt-3">
                        <h4>SEO Tags</h4>
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" class="form-control" value="{{ $category->meta_title }}">
                        @error('meta_title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="">Meta Keyword</label>
                        <textarea type="text" name="meta_keyword" class="form-control" rows="5">{{ $category->meta_keyword }}</textarea>
                        @error('meta_keyword')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-12 mt-3">
                        <label for="">Meta Description</label>
                        <textarea type="text" name="meta_description" class="form-control" rows="5">{{ $category->meta_description }}</textarea>
                        @error('meta_description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="col-md-12 mt-3">
                        <button type="submit" class="btn btn-primary float-end text-white">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection