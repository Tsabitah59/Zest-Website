<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category, $brandInputs = [], $priceInput;

    public function mount($category) {
        $this->category = $category;
    }

    // bawaan dari Livewire untuk membuat URL
    protected $queryString = [
        'brandInputs'   => ['except' => '', 'as' => 'brand'],
        'priceInput'   => ['except' => '', 'as' => 'price'],
        // Jika dicentang dikasih "as", ketika tidak dicentang, dikasih "except"
    ];

    public function render()
    { 
        // Dapatkan data product yang id-nya sama dengan slug yang ada di belakangnya 
        // ketika dilakukan action, jalankan function untuk menyimpan  
        // statusnya harus 0 (Visible)
        // $this mengembalikan ke index
        $this->products = Product::where('category_id', $this->category->id)
                                ->when($this->brandInputs, function($q) {
                                    $q->whereIn('brand', $this->brandInputs);
                                })
                                ->when($this->priceInput, function($q) {
                                    $q->when($this->priceInput == 'high-to-low', function($q2) {
                                        $q2->orderBy('selling_price', 'DESC');
                                    })
                                    ->when($this->priceInput == 'low-to-high', function($q2) {
                                        $q2->orderBy('selling_price', 'ASC');
                                    });
                                })
                                ->where('status', '0')
                                ->get();

                                
       
        return view('livewire.frontend.product.index', [
            'products' =>$this->products,
            'category' =>$this->category,
        ]);
    }

    public function applyFilter() {
        $this->products = Product::where('category_id', $this->category->id)
                                ->when($this->brandInputs, function($q) {
                                    $q->whereIn('brand', $this->brandInputs);
                                })
                                ->when($this->priceInput, function($q) {
                                    $q->when($this->priceInput == 'high-to-low', function($q2) {
                                        $q2->orderBy('selling_price', 'DESC');
                                    })
                                    ->when($this->priceInput == 'low-to-high', function($q2) {
                                        $q2->orderBy('selling_price', 'ASC');
                                    });
                                })
                                ->get();
    }
}