<div>
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ข้อมูลจังหวัด</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="prov_code">รหัส</label>
                                    <input
                                        type="text"
                                        class="form-control" 
                                        placeholder="รหัสจังหวัด" 
                                        wire:model="prov_code"/>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="prov_name">ชื่อ</label>
                                    <input
                                        type="text"
                                        class="form-control" 
                                        placeholder="รหัสจังหวัด" 
                                        wire:model="prov_name"/>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="prov_status">สถานะ</label>
                                    <select
                                        class="form-control" 
                                        wire:model="prov_status">
                                        <option value="1">ใช้งาน</option>
                                        <option value="0">ยกเลิก</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prov_desc">รายละเอียด</label>
                            <textarea
                                class="form-control" 
                                wire:model="prov_desc"></textarea>
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
