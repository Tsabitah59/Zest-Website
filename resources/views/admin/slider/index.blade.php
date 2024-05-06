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
                    Slider List
                    <a href="{{ route('slider-create') }}" class="btn btn-primary text-white float-end">Add Slider</a>
                </h3>
            </div>
    
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach($sliders as $slider)
                        <tr>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->description }}</td>
                            <td>
                                <img src="{{ asset("$slider->image") }}" alt="Image" style="width: 70px">
                            </td>
                            <td>{{ $slider->status == '0' ? 'Visible' : 'Hidden' }}</td>
                            <td>
                                <a href="#" class="btn btn-success text-white btn-sm">Edit</a>
                                <a href="#" class="btn btn-danger text-white btn-sm">Delete</a>
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