@extends('layouts.admin')

@section('content')

<div class="row">
    @if(session('message'))
    <div class="alertalert-success">{{ session('message') }}</div>
    @endif
    <div class="col-md-12 grid margin">
        <div class="card">
            <div class="card-header">
                <h3>
                    Edit Colors
                    <a href="{{ route('colors-index') }}" class="btn btn-danger text-white float-end">Back</a>
                </h3>
            </div>
    
            <div class="card-body">
                <form action="{{ route('colors-update', $color->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="color-name">Color Name</label>
                        <input type="text" name="name" value="{{ $color->name }}" class="form-control">
                    </div>
    
                    <div class="mb-3">
                        <label for="color-code">Color Code</label>
                        <input type="text" name="code" value="{{ $color->code }}" class="form-control">
                    </div>
    
                    <div class="mb-3">
                        <label for="status">Status</label>
                        <input type="checkbox" name="status" {{ $color->status ? 'checked' : '' }}>
                    </div>
    
                    <div class="mb-3">
                        <button class="btn btn-primary text-white" type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection