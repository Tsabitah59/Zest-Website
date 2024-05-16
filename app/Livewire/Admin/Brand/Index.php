<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $name, $slug, $status, $brand_id,  $category_id;

    // Untuk validasi
    public function rules(){
        return [
            'name'              =>  'required|string',
            'slug'              =>  'required|string',
            'category_id'       =>  'required|integer',
            'status'            => 'nullable',
        ];
    }

    public function resetInput() {
        $this->name = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brand_id = NULL;
        $this->category_id = NULL;
    }

    // Untuk Tambah Data
    public function storeBrand() {
        $validateData = $this->validate();
        Brand::create([
            'name'          =>$this->name,
            'slug'          =>Str::slug($this->slug),
            'status'        =>$this->status == true ? '1':'0',
            'category_id'   => $this->category_id
        ]);
        session()->flash('message', 'Brand Added');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    // Modal
    public function closeModal() {
        $this->resetInput();
    }

    function openModal() {
        $this->resetInput();
    }

    public function editBrand($brand_id) {
        $this->brand_id = $brand_id;

        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
        $this->category_id = $brand->category_id;
    }

    // Update Data 
    function updateBrand() {
        $validateData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name'          =>$this->name,
            'slug'          =>Str::slug($this->slug),
            'status'        =>$this->status == true ? '1':'0',
            'category_id'   =>$this->category_id
        ]);
        session()->flash('message', 'Brand Added');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    // Hapus data
    public function deleteBrand($brand_id) {
        $this->brand_id = $brand_id;
    }

    // Destroy
    public function destroyBrand() {
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message', 'You deleted this data!');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function render() {
        $categories = Category::where('status' , '0')->get();
        $brands = Brand::orderBy('id', 'ASC')->paginate(10);

        return view('livewire.admin.brand.index', ['brands' => $brands, 'categories' => $categories])
                    ->extends('layouts.admin')
                    ->section('content');
    }
}

// Where digunakan untuk filterisasi. Dalam kasus ini dengan status