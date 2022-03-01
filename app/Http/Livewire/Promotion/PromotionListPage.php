<?php

namespace App\Http\Livewire\Promotion;

use Livewire\Component;
use App\Models\Promotion;
use Livewire\WithPagination;

class PromotionListPage extends Component
{
    use WithPagination;

    public $searchTerm = '';

    public function render()
    {
        $promotions = Promotion::query();

        if($this->searchTerm)
        {
            $promotions = $promotions
                            ->where('prom_name','Like',"%{$this->searchTerm}%");
        }

        $promotions = $promotions
                        ->orderBy('id','desc')
                        ->paginate(20);

        return view('livewire.promotion.promotion-list-page',[
            'promotions' => $promotions
        ])->extends('layouts.main');
    }
}
