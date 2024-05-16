<?php

namespace App\Livewire\Frontend\Product;

use Livewire\Component;

class Detail extends Component
{
    public $category, $product;

    public function mount($category, $product) {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.detail', [
            'category'  =>$this->category,
            'prod'      =>$this->product,
        ]);
    }

    public function colorSelected($productColorId) {
        // dd($productColorId);
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
    }

}
