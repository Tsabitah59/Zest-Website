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
                    Add Colors
                    <a href="{{ route('colors-index') }}" class="btn btn-danger text-white float-end">Back</a>
                </h3>
            </div>
    
            <div class="card-body">
                <form action="{{ route('colors-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="color-name">Color Name</label>
                        <input type="text" name="name" class="form-control" value="">
                    </div>
    
                    <div class="mb-3">
                        <label for="color-code">Color Code</label>
                        <input type="text" name="code" class="form-control">
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