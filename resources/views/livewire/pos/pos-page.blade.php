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
                        <div class="row">
                            <div class="col-12">
                                <div class="custom-control custom-radio">
                                    <input 
                                        class="custom-control-input" 
                                        type="radio" 
                                        id="customRadio1"
                                        name="customRadio"
                                        wire:model="barQr" 
                                        value="1" />
                                    <label for="customRadio1" class="custom-control-label">Normal</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input 
                                        class="custom-control-input" 
                                        type="radio" 
                                        id="customRadio2"
                                        name="customRadio"
                                        wire:model="barQr" 
                                        value="2" />
                                    <label for="customRadio2" class="custom-control-label">Barcode</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input 
                                        class="custom-control-input" 
                                        type="radio" 
                                        id="customRadio3"
                                        name="customRadio"
                                        wire:model="barQr" 
                                        value="3" />
                                    <label for="customRadio3" class="custom-control-label">QrCode</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="row mt-2 overflow-auto" style="height: 40%; @if($barQr != 1) display: none; @endif">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                        @livewire('pos.pos-product-box', ['product' => $product], key($product->id))
                    </div>
                @endforeach
            </div>
            <div class="row mt-2 overflow-auto" style="height: 40%; @if($barQr != 2) display: none; @endif">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6">
                        @livewire('pos.pos-product-bar-code', ['product' => $product], key($product->id."barcode"))
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
