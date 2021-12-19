<div>
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ข้อมูลตำบล</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="province_id">จังหวัด</label>
                                    <select
                                        class="form-control @error('province_id') is-invalid @enderror" 
                                        wire:model="province_id">
                                        <option value="">-- กรุณาเลือกจังหวัด --</option>
                                        @foreach ($provinces as $item)
                                        <option value="{{ $item->id }}">{{ $item->prov_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                    <div id="province_id_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="district_id">อำเภอ</label>
                                    <select
                                        class="form-control @error('district_id') is-invalid @enderror" 
                                        wire:model="district_id">
                                        <option value="">-- กรุณาเลือกอำเภอ --</option>
                                        @foreach ($districts as $item)
                                        <option value="{{ $item->id }}">{{ $item->dist_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                    <div id="district_id_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="subd_code">รหัส</label>
                                    <input
                                        type="text"
                                        class="form-control @error('subd_code') is-invalid @enderror" 
                                        placeholder="รหัสตำบล" 
                                        wire:model="subd_code"/>
                                    @error('subd_code')
                                    <div id="subd_code_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="subd_name">ชื่อ</label>
                                    <input
                                        type="text"
                                        class="form-control @error('subd_name') is-invalid @enderror" 
                                        placeholder="ชื่อตำบล" 
                                        wire:model="subd_name"/>
                                    @error('subd_name')
                                    <div id="subd_name_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="subd_zip_code">รหัสไปรษณีย์</label>
                                    <input
                                        type="text"
                                        class="form-control @error('subd_zip_code') is-invalid @enderror" 
                                        placeholder="รหัสไปรษณีย์" 
                                        wire:model="subd_zip_code"/>
                                    @error('subd_zip_code')
                                    <div id="subd_zip_code_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="subd_status">สถานะ</label>
                                    <select
                                        class="form-control" 
                                        wire:model="subd_status">
                                        <option value="1">ใช้งาน</option>
                                        <option value="0">ยกเลิก</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subd_desc">รายละเอียด</label>
                            <textarea
                                class="form-control" 
                                wire:model="subd_desc"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" wire:click="save">บันทึก</button>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
