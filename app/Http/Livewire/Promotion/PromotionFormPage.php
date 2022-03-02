<?php

namespace App\Http\Livewire\Promotion;

use Livewire\Component;

class PromotionFormPage extends Component
{
    public $idKey=0;
    public $prom_name;
    public $prom_begin;
    public $prom_end;
    public $prom_status=1;
    public $prom_desc;

    public function mount($id = 0)
    {

    }

    public function render()
    {
        return view('livewire.promotion.promotion-form-page')->extends('layouts.main');
    }
}
