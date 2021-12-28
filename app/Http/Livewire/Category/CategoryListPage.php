<?php

namespace App\Http\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoryListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public $searchTerm;

    protected $listeners = [
        'refreshCategoryList' => '$refresh'
    ];

    public function render()
    {
        $categories = Category::query();

        if($this->searchTerm){
            $categories = $categories
                            ->where('cate_name','LIKE',"%{$this->searchTerm}%");
        }

        $categories = $categories->paginate(15);
        
        return view('livewire.category.category-list-page',[
            'categories' => $categories
        ])->extends("layouts.main");
    }
}
