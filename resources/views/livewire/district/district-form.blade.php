<div>
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ข้อมูลอำเภอ</h4>
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
                                    <label for="dist_code">รหัส</label>
                                    <input
                                        type="text"
                                        class="form-control @error('dist_code') is-invalid @enderror" 
                                        placeholder="รหัสอำเภอ" 
                                        wire:model="dist_code"/>
                                    @error('dist_code')
                                    <div id="dist_code_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="dist_name">ชื่อ</label>
                                    <input
                                        type="text"
                                        class="form-control @error('dist_name') is-invalid @enderror" 
                                        placeholder="ชื่ออำเภอ" 
                                        wire:model="dist_name"/>
                                    @error('dist_name')
                                    <div id="dist_name_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="dist_status">สถานะ</label>
                                    <select
                                        class="form-control" 
                                        wire:model="dist_status">
                                        <option value="1">ใช้งาน</option>
                                        <option value="0">ยกเลิก</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dist_desc">รายละเอียด</label>
                            <textarea
                                class="form-control" 
                                wire:model="dist_desc"></textarea>
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
