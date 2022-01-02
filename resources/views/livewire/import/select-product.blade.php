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
                    <form >
                        <input 
                            type="text" 
                            class="form-control mb-2" 
                            placeholder="Search ...." 
                            wire:model="searchTerm">
                    </form>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                              <th style="width: 10px">ID</th>
                              <th>ชื่อ</th>
                              <th>หน่วย</th>
                              <th>ราคา</th>
                              <th style="width: 40px">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $prod)
                            <tr>
                                <td>{{ $prod->id }}</td>
                                <td>{{ $prod->prod_name }}</td>
                                <td>{{ $prod->prod_unit }}</td>
                                <td>{{ $prod->prod_cost }}</td>
                                <td>
                                    <button 
                                        type="button" 
                                        class="btn bg-navy" 
                                        wire:click.prevent="$emit('selectedProduct',{{ $prod->id }})">
                                        <i class="fas fa-check"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
