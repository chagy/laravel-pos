<div>
    <div class="modal fade" id="modal" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">รายการสินค้า</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="input-group">
                                <input 
                                type="text" 
                                class="form-control" 
                                placeholder="Search" 
                                wire:model="searchTerm" />
            
                                <div class="input-group-append">
                                    <button
                                        type="button"
                                        class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>ชื่อ</th>
                            <th>ราคา</th>
                            <th style="width: 40px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            <tr>
                                <td>{{ $item->prod_name }}</td>
                                <td>{{ $item->prod_price }}</td>
                                <td>
                                    <button 
                                        type="button" 
                                        wire:click="$emit('selectProduct',{{ $item->id }})"
                                        class="btn btn-sm btn-info" >
                                        <i class="fas fa-check"></i>
                                    </button>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                    {!! $products->links() !!}
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
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
