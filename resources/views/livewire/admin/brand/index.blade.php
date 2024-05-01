<div>
    @include('livewire.admin.brand.modal-form')
    <div class="row">
        <div class="row-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Brand List</h4>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-primary text-white float-end">Add Brand</a>
                </div>
    
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($brands as $brand)
                            <tr>
                                <td>{{ $brand->id }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->slug }}</td>
                                <td>{{ $brand->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                <td>
                                    <a href="" wire:click="editBrand({{$brand->id}})" class="btn btn-success btn-sm text-white" data-bs-toggle="modal" data-bs-target="#editBrandModal">Edit</a>
                                    <a href="" wire:click="deleteBrand({{$brand->id}})" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal" data-bs-target="#deleteBrandModal">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Brands Found 🏵️</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="">
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@push('script')
<script>
    window.addEventListener('close-modal', event => {
        $('#addBrandModal').modal('hide');
        $('#editBrandModal').modal('hide');
        $('#deleteBrandModal').modal('hide');
    })
</script>
@endpush
