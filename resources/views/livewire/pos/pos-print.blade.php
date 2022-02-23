<div>
    <div class="modal fade" id="form-print-modal" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">พิมพ์ใบเสร็จ</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <a 
                                @if(!empty($pos) && $pos->id > 0)
                                href="{!! route('pos.print.slip',$pos->id) !!}" 
                                @endif
                                target="_blank" 
                                class="btn btn-primary btn-block">
                                <i class="fas fa-print"></i> พิมพ์ใบเสร็จ
                            </a>
                        </div>
                        <div class="col-12">
                            <a 
                                @if(!empty($pos) && $pos->id > 0)
                                href="{!! route('pos.print.a',$pos->id) !!}" 
                                @endif
                                target="_blank" 
                                class="btn btn-info btn-block">
                                <i class="fas fa-print"></i> พิมพ์ใบเสร็จ A4
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
