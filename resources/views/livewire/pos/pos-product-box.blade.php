<div class="card" wire:click="addCart">
    @if ($product->prod_picture)
    <img 
    src="{!! asset('images/products/'.$product->prod_picture) !!}" 
    alt="Product" 
    class="card-img-top"  
    style="height: 200px;">
    @else
    <img 
        src="https://via.placeholder.com/200" 
        alt="Product" 
        class="card-img-top"  
        style="height: 200px;">
    @endif
    
    <div class="card-body">
        <p class="card-text">
            {{ $product->prod_name }}
        </p>
        <div class="row align-item-center">
            <div class="col-6">
                <span style="font-weight: bold;font-size: 1.25rem;">
                    {{ number_format($product->prod_price,0) }}
                </span>
            </div>
            <div class="col-6"></div>
        </div>
    </div>
</div>
