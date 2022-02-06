<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;

class PosCalculator extends Component
{
    public $money = 1000;
    
    public function render()
    {
        return view('livewire.pos.pos-calculator');
    }
}
