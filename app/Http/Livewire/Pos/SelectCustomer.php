<?php

namespace App\Http\Livewire\Pos;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class SelectCustomer extends Component
{
    use WithPagination;
    
    public $searchTerm;

    public function render()
    {
        $customers = User::where('type',2);

        if($this->searchTerm){
            $customers = $customers
                            ->where('name','LIKE',"%{$this->searchTerm}%")
                            ->orWhere('phone','LIKE',"%{$this->searchTerm}%");
        }

        $customers = $customers
                        ->paginate(15);
        return view('livewire.pos.select-customer',[
            'customers' => $customers
        ]);
    }
}
