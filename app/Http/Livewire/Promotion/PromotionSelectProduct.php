<?php

namespace App\Http\Livewire\Promotion;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class PromotionSelectProduct extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public $searchTerm;

    protected $listeners = [
        
    ];

    public function updatingSearchTerm()
    {
        $this->gotoPage(1);
    }

    public function render()
    {
        $products = Product::query();

        if($this->searchTerm){
            
            $products = $products
                            ->where('prod_name','LIKE',"%{$this->searchTerm}%");

        }

        $products = $products->paginate(15);
        return view('livewire.promotion.promotion-select-product',[
            'products' => $products
        ]);
    }
}
