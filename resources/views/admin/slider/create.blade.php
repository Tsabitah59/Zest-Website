@extends('layouts.admin')

@section('content')

<div class="row">
    @if(session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="col-md-12 grid margin">
        <div class="card">
            <div class="card-header">
                <h3>
                    Add Slider
                    <a href="{{ route('slider-index') }}" class="btn btn-danger text-white float-end">Back</a>
                </h3>
            </div>
    
            <div class="card-body">
                <form action="{{ route('slider-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="color-name">Title</label>
                        <input type="text" name="title" class="form-control" value="">
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <label for="color-code">Description</label>
                        <textarea name="description" class="form-control"></textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="color-name">Image</label>
                        <input type="file" name="image" class="form-control">
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status">
                    </div>
    
                    <div class="mb-3">
                        <button class="btn btn-primary text-white" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection