<div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ฟอร์มนำเข้าสินค้า</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="supplier_id">ผู้ผลิต</label>
                                    <select 
                                        class="form-control @error('supplier_id') is-invalid @enderror" 
                                        name="supplier_id"
                                        id="supplier_id" 
                                        wire:model="supplier_id">
                                        <option value="">กรุณาเลือกผู้ผลิต</option>
                                        @foreach ($suppliers as $sup)
                                        <option value="{{ $sup->id }}">{{ $sup->sup_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                    <div id="supplier_id_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="impo_process">สถานะ</label>
                                    <select 
                                        class="form-control @error('impo_process') is-invalid @enderror" 
                                        name="impo_process"
                                        id="impo_process" 
                                        wire:model="impo_process">
                                        <option value="">กรุณาเลือกสถานะ</option>
                                        <option value="2">รอตรวจสอบ</option>
                                        <option value="1">เสร็จกระบวนการ</option>
                                        <option value="0">ยกเลิก</option>
                                    </select>
                                    @error('impo_process')
                                    <div id="impo_process_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>ชื่อ</th>
                                        <th>จำนวน</th>
                                        <th>ราคาต่อหน่วย</th>
                                        <th>ยอดรวม</th>
                                        <th>
                                            @livewire('import.select-product')
                                            <button 
                                                type="button" 
                                                class="btn btn-block bg-maroon"
                                                data-target="#modal"
                                                data-toggle="modal">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">
                                บันทึกข้อมูล
                            </button>
                        </div>
                    </form>
                </div>
                <div wire:loading wire:target="save"  wire:loading.class="overlay" wire:loading.flex>
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
