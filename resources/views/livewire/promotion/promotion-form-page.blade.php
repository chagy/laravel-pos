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
                </form>
            </div>
        </div>
    </div>
</div>
