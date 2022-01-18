<div>
    <br/>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-4">
                                <select class="form-control" wire:model="category">
                                    <option value="">ทั้งหมด</option>
                                    @foreach ($categories as $cate)
                                    <option value="{{ $cate->id }}">{{ $cate->cate_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-8">
                                <div class="input-group">
                                    <input 
                                        type="text" 
                                        placeholder="ค้นหา ชื่อ/บาร์โค้ด" 
                                        class="form-control" 
                                        wire:model="searchTerm">
                                    <span class="input-group-append">
                                        <button class="btn btn-success">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="row mt-2 overflow-auto" style="min-height:60%;">
                @for ($i = 0; $i < 20; $i++)
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                        <div class="card">
                            <img src="{!! asset('images/products/20211231133545at2tnE98fbbYkHgC.png') !!}" alt="Product" class="card-img-top">
                            <div class="card-body">
                                <p class="card-text">
                                    Product {{ $i }}
                                </p>
                                <div class="row align-item-center">
                                    <div class="col-6">
                                        <span style="font-weight: bold;font-size: 1.25rem;">100</span>
                                    </div>
                                    <div class="col-6"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
                
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="input-group input-group-lg mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                ลด ฿
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="0.00" style="text-align: right;">
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
                            value="100">
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
                            value="Guest">
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
