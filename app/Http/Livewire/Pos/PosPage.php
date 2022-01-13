<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;

class PosPage extends Component
{
    public function render()
    {
        return view('livewire.pos.pos-page')->extends('layouts.main');
    }
}
