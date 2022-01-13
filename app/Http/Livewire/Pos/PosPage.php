<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;
use App\Models\Category;

class PosPage extends Component
{
    public $searchTerm;
    public $category;

    public function render()
    {
        return view('livewire.pos.pos-page',[
            'categories' => Category::where('cate_status',1)->get()
        ])->extends('layouts.main');
    }
}
