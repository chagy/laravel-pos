<div>
    <div class="modal fade" id="modal-product-edit" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">แก้ไขราคาสินค้า</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        class="form-control @error('quantity') is-invalid @enderror" 
                                        placeholder="จำนวน" 
                                        wire:model="quantity"/>
                                    @error('quantity')
                                    <div id="quantity_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        class="form-control @error('price') is-invalid @enderror" 
                                        placeholder="ราคา" 
                                        wire:model="price"/>
                                    @error('price')
                                    <div id="price_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        class="form-control @error('discountItem') is-invalid @enderror" 
                                        placeholder="ส่วนลด" 
                                        wire:model="discountItem"/>
                                    @error('discountItem')
                                    <div id="discountItem_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
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
