<div>
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">ข้อมูลประเภท</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="cate_name">ชื่อ</label>
                                    <input
                                        type="text"
                                        class="form-control @error('cate_name') is-invalid @enderror" 
                                        placeholder="ชื่อประเภท" 
                                        wire:model="cate_name"/>
                                    @error('cate_name')
                                    <div id="cate_name_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="cate_status">สถานะ</label>
                                    <select
                                        class="form-control" 
                                        wire:model="cate_status">
                                        <option value="1">ใช้งาน</option>
                                        <option value="0">ยกเลิก</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cate_desc">รายละเอียด</label>
                            <textarea
                                class="form-control" 
                                wire:model="cate_desc"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary" wire:click="save">บันทึก</button>
                </div>
            </div>
            <div wire:loading wire:target="save"  wire:loading.class="overlay" wire:loading.flex>
                <div class="d-flex justify-content-center align-items-center">
                    <i class="fas fa-2x fa-sync fa-spin"></i>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
