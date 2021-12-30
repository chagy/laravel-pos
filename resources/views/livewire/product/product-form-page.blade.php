<div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ฟอร์มพนักงาน</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="category_id">ประเภท</label>
                                    <select
                                        class="form-control @error('category_id') is-invalid @enderror" 
                                        wire:model="category_id">
                                        <option value="">-- กรุณาเลือกประเภท --</option>
                                        @foreach ($categories as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->cate_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div id="category_id_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="prod_name">ชื่อ</label>
                                    <input
                                        type="text"
                                        class="form-control @error('prod_name') is-invalid @enderror" 
                                        placeholder="ชื่อสินค้า" 
                                        wire:model="prod_name"/>
                                    @error('prod_name')
                                    <div id="prod_name_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="prod_cost">ต้นทุน</label>
                                    <input
                                        type="text"
                                        class="form-control @error('prod_cost') is-invalid @enderror" 
                                        placeholder="ต้นทุน" 
                                        wire:model="prod_cost"/>
                                    @error('prod_cost')
                                    <div id="prod_cost_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="prod_price">ราคาขาย</label>
                                    <input
                                        type="text"
                                        class="form-control @error('prod_price') is-invalid @enderror" 
                                        placeholder="ราคาขาย" 
                                        wire:model="prod_price"/>
                                    @error('prod_price')
                                    <div id="prod_price_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="prod_unit">หน่วย</label>
                                    <input
                                        type="text"
                                        class="form-control @error('prod_unit') is-invalid @enderror" 
                                        placeholder="หน่วย" 
                                        wire:model="prod_unit"/>
                                    @error('prod_unit')
                                    <div id="prod_unit_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="prod_qty">จำนวน</label>
                                    <input
                                        type="text"
                                        class="form-control @error('prod_qty') is-invalid @enderror" 
                                        placeholder="จำนวน" 
                                        wire:model="prod_qty"/>
                                    @error('prod_qty')
                                    <div id="prod_qty_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="prod_discount">ส่วนลด</label>
                                    <input
                                        type="text"
                                        class="form-control @error('prod_discount') is-invalid @enderror" 
                                        placeholder="ส่วนลด" 
                                        wire:model="prod_discount"/>
                                    @error('prod_discount')
                                    <div id="prod_discount_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="prod_bar_code">บาร์โค้ด</label>
                                    <input
                                        type="text"
                                        class="form-control" 
                                        placeholder="บาร์โค้ด" 
                                        wire:model="prod_bar_code"/>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="prod_status">สถานะ</label>
                                    <select
                                        class="form-control" 
                                        wire:model="prod_status">
                                        <option value="1">ใช้งาน</option>
                                        <option value="0">ยกเลิก</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="prod_picture">รูป</label>
                                    <input
                                        type="file"
                                        class="form-control" 
                                        wire:model="prod_picture"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">
                                บันทึกข้อมูล
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
