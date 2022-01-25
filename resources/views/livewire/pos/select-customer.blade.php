<div>
    <div class="modal fade" id="modal-customer" wire:ignore.self>
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">รายชื่อลูกค้า</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        class="form-control" 
                                        placeholder="ค้นหา ชื่อ, เบอร์โทร ..." 
                                        wire:model="searchTerm"/>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width: 10px">#</th>
                                <th>รูป</th>
                                <th>ชื่อ</th>
                                <th>เบอร์โทร</th>
                                <th style="width: 40px">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td class="text-center">
                                      @if ($item->avatar)
                                          <img 
                                            class="profile-user-img img-fluid img-circle" 
                                            src="{{ asset('/images/customers/'.$item->avatar) }}" 
                                            width="100px"/>
                                      @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td class="text-center align-middle">
                                        <button
                                            wire:click="$emit('posSelectCustomer',{{ $item->id}})"
                                            class="btn btn-sm btn-info" >
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </td>
                                </tr> 
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
