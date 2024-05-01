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
                    Color List
                    <a href="{{ route('colors-create') }}" class="btn btn-primary text-white float-end">Add Colors</a>
                </h3>
            </div>
    
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Color Name</th>
                            <th>Color Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach($colors as $color)
                        <tr>
                            <td>{{ $color->id }}</td>
                            <td>{{ $color->name }}</td>
                            <td>{{ $color->code }}</td>
                            <td>{{ $color->status ? 'Hidden' : 'Visible' }}</td>
                            <td>
                                <a href="{{ route('colors-edit', $color->id ) }}" class="btn btn-sm btn-success text-white">Edit</a>
                                <a href="{{ route('colors-delete', $color->id ) }}" onclick="return confirm('Are you sure want to delete {{ $color->name }}?')" class="btn btn-sm btn-danger text-white">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
    
                </table>
            </div>
        </div>
    </div>
</div>

@endsection