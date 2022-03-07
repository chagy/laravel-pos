<?php

namespace App\Http\Livewire\Pos;

use Cart;
use App\Models\User;
use Livewire\Component;

class PosCart extends Component
{
    public $discount=0;
    public $discountItem = 0;
    public $total = 0;
    public $customerId=0;
    public $customerData;
    public $items = [];

    protected $listeners = [
        'posCartRefresh' => 'cartUpdate',
        'posSelectCustomer' => 'selectCustomer'
    ];

    public function updatedDiscount()
    {
        $this->total = Cart::getTotal();
        $this->total = $this->total - $this->discount - $this->discountItem;
    }

    public function deleteProduct($id)
    {
        Cart::remove($id);
        $this->mount();
    }

    public function cartUpdate()
    {
        $this->mount();
    }

    public function selectCustomer($id)
    {
        $customer = User::findOrFail($id);
        $this->customerId = $customer->id;
        $this->customerData = $customer->name;

        $this->emit('modalHide');
    }

    public function mount()
    {
        $cart = Cart::getContent()->sortByDesc(function($product,$key){
            return $product->attributes->dateOrder;
        });

        $this->items = $cart->values()->toArray();

        $this->discountItem = 0;
        $promotion = 0;
        foreach ($cart as $key => $value) {
            $this->discountItem += $value->attributes->psod_item_discount_total;
            $promotion += $value->attributes->psod_item_promotion;
        }

        $this->total = Cart::getTotal() - $this->discount - $this->discountItem - $promotion;

        $customer_guest = User::where('type',2)->where('username','guest')->first();
        $this->customerId = $customer_guest->id;
        $this->customerData = $customer_guest->name;
    }
    
    public function render()
    {

        return view('livewire.pos.pos-cart');
    }
}
