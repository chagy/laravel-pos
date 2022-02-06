<div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ฟอร์มตั้งค่า</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sett_name">ชื่อร้าน</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('sett_name') is-invalid @enderror" 
                                        name="sett_name"
                                        id="sett_name" 
                                        placeholder="ชื่อร้าน" 
                                        wire:model="sett_name"/>
                                    @error('sett_name')
                                    <div id="sett_name_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sett_phone">เบอร์โทร</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('sett_phone') is-invalid @enderror" 
                                        name="sett_phone"
                                        id="sett_phone" 
                                        placeholder="เบอร์โทร" 
                                        wire:model="sett_phone"/>
                                    @error('sett_phone')
                                    <div id="sett_phone_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sett_tax_id">เลขที่เสียภาษี</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('sett_tax_id') is-invalid @enderror" 
                                        name="sett_tax_id"
                                        id="sett_tax_id" 
                                        placeholder="เลขที่เสียภาษี" 
                                        wire:model="sett_tax_id"/>
                                    @error('sett_tax_id')
                                    <div id="sett_tax_id_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sett_vat">Vat %</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('sett_vat') is-invalid @enderror" 
                                        name="sett_vat"
                                        id="sett_vat" 
                                        placeholder="Vat %" 
                                        wire:model="sett_vat"/>
                                    @error('sett_vat')
                                    <div id="sett_vat_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sett_owner">ชื่อเจ้าของร้าน</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('sett_owner') is-invalid @enderror" 
                                        name="sett_owner"
                                        id="sett_owner" 
                                        placeholder="ชื่อเจ้าของร้าน" 
                                        wire:model="sett_owner"/>
                                    @error('sett_owner')
                                    <div id="sett_owner_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
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
                <div wire:loading wire:target="save"  wire:loading.class="overlay" wire:loading.flex>
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
