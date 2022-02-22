<?php

namespace App\Http\Livewire\Pos;

use Livewire\Component;
use App\Models\PosOrder;

class PosPrint extends Component
{
    public $pos;

    protected $listeners = [
        'openPrintModal' => 'openModal'
    ];

    public function openModal($id)
    {
        $this->pos = PosOrder::findOrFail($id);
        $this->dispatchBrowserEvent('formPrintModal',[
            'status' => 'show'
        ]);
    }

    public function render()
    {
        return view('livewire.pos.pos-print');
    }
}
