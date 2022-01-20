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
            
            <div class="row mt-2 overflow-auto" style="height: 40%;">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                        @livewire('pos.pos-product-box', ['product' => $product], key($product->id))
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    @livewire('pos.pos-cart')
                </div>
            </div>
        </div>
    </div>
</div>
