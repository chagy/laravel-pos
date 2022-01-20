<div>
    <div class="input-group input-group-lg mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                ลด ฿
            </span>
        </div>
        <input 
            type="text" 
            class="form-control" 
            placeholder="0.00" 
            style="text-align: right;" 
            wire:model="discount">
        <div class="input-group-append">
            <div class="input-group-text">
                <i class="fas fa-percent"></i>
            </div>
        </div>
    </div>
    <div class="input-group input-group-lg mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                รวม ฿
            </span>
        </div>
        <input 
            type="text" 
            class="form-control" 
            readonly 
            style="color: red;font-weight: bold;font-size: 2rem;text-align:right;" 
            value="100" 
            wire:model="total">
        <div class="input-group-append">
            <div class="input-group-text">
                <i class="fas fa-calculator"></i>
            </div>
        </div>
    </div>
    <div class="input-group input-group-lg mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">
                ลูกค้า
            </span>
        </div>
        <input 
            type="text" 
            class="form-control" 
            readonly 
            style="color: blue;font-weight: bold;font-size: 1.5rem;" 
            value="Guest" 
            wire:model="customerData">
        <div class="input-group-append">
            <button 
                type="button" 
                class="input-group-text">
                <i class="fas fa-user"></i>
            </button>
        </div>
    </div>

    <button 
        type="button" 
        class="btn btn-lg btn-block btn-primary mb-3">
        ชำระเงิน
    </button>

    <div class="table-responsive p-0" style="height: 500px;">
        <table class="table">
            @forelse ($items as $item)
            <tr>
                <td class="align-middle">
                    1. ชื่อสินค้า
                </td>
                <td class="text-right">
                    <span>
                        100 x 10
                    </span>
                    <br/>
                    <span>
                        1000
                    </span>
                </td>
                <td class="align-middle">
                    <div class="btn-group">
                        <button 
                            type="button" 
                            class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button 
                            type="button" 
                            class="btn btn-success btn-sm">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">ไม่มีสินค้าในตะกร้า</td>
            </tr>
            @endforelse
            
            
        </table>
    </div>
</div>