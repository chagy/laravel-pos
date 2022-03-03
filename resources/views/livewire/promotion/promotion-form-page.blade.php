<div class="row">
    <div class="col-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">โปรโมชั่น</h3>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="savePromotion">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prom_name">ชื่อโปรโมชั่น</label>
                                <input 
                                    type="text"
                                    class="form-control @error('prom_name') is-invalid @enderror" 
                                    name="prom_name" 
                                    id="prom_name" 
                                    wire:model="prom_name" />
                                @error('prom_name')
                                <span id="prom_name_error" class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prom_status">สถานะ</label>
                                <select
                                    class="form-control @error('prom_status') is-invalid @enderror" 
                                    name="prom_status" 
                                    id="prom_status" 
                                    wire:model="prom_status" >
                                    <option value="1">ใช้งาน</option>
                                    <option value="0">ยกเลิก</option>
                                </select>
                                @error('prom_status')
                                <span id="prom_status_error" class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prom_begin">วันที่เริ่ม</label>
                                <input 
                                    type="date"
                                    class="form-control @error('prom_begin') is-invalid @enderror" 
                                    name="prom_begin" 
                                    id="prom_begin" 
                                    wire:model="prom_begin" />
                                @error('prom_begin')
                                <span id="prom_begin_error" class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="prom_end">วันที่สิ้นสุด</label>
                                <input 
                                    type="date"
                                    class="form-control @error('prom_end') is-invalid @enderror" 
                                    name="prom_end" 
                                    id="prom_end" 
                                    wire:model="prom_end" />
                                @error('prom_end')
                                <span id="prom_end_error" class="error invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="prom_desc">รายละเอียด</label>
                        <textarea 
                            type="date"
                            class="form-control" 
                            name="prom_desc" 
                            id="prom_desc" 
                            wire:model="prom_desc"></textarea>
                    </div>

                    @livewire('promotion.promotion-select-product')

                    <div class="row">
                        <div class="col-12">
                            <button 
                                type="button" 
                                data-toggle="modal"  
                                data-target="#modal" 
                                class="btn btn-success btn-block">
                                เลือกสินค้า
                            </button>
                        </div>
                    </div>
                    @if($products)
                    <div class="row mt-2">
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>ราคา</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $prod)
                                    <tr>
                                        <td>{{ $prod['product_id'] }}</td>
                                        <td>{{ $prod['product_name'] }}</td>
                                        <td class="text-right">{{ $prod['product_price'] }}</td>
                                        <td class="text-center">
                                            <button 
                                                type="button" 
                                                wire:click="deleteProductRow({{ $key }})"
                                                class="btn btn-danger">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-12">
                            <button 
                                type="button" 
                                class="btn btn-info btn-block" 
                                wire:click="addCondition">
                                <i class="fas fa-plus"></i> เงื่อนไข
                            </button>
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ซื้อขั้นต่ำ (ชิ้น)</th>
                                        <th>ลด (฿)</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($conditions as $key => $con)
                                     <tr>
                                         <td>
                                             <input 
                                                type="number" 
                                                name="product_qty[]" 
                                                id="product_qty.{{$key}}"
                                                class="form-control" 
                                                wire:model="product_qty.{{$key}}" />
                                         </td>
                                         <td>
                                            <input 
                                                type="text" 
                                                name="product_discount[]" 
                                                id="product_discount.{{$key}}"
                                                class="form-control" 
                                                wire:model="product_discount.{{$key}}" />
                                         </td>
                                         <td class="text-center">
                                             <button 
                                                type="button" 
                                                wire:click="deleteConditionRow({{ $key }})" 
                                                class="btn btn-link text-danger">
                                                <i class="fas fa-trash"></i>
                                             </button>
                                         </td>
                                     </tr>   
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
