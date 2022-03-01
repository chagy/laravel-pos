<div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">รายการสินค้า</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input 
                        type="text" 
                        class="form-control float-right" 
                        placeholder="Search" 
                        wire:model="searchTerm" />
  
                      <div class="input-group-append">
                        <button 
                          class="btn btn-primary">
                            <i class="fas fa-search"></i>
                          </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>ชื่อ</th>
                        <th>ประเภท</th>
                        <th>ราคาปกติ</th>
                        <th>ส่วนลด</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->prod_name }}</td>
                            <td>{{ $item->category->cate_name }}</td>
                            <td>{{ $item->prod_price }}</td>
                            <td>
                              @if($item->id != $idKey)
                                {{ $item->prod_discount }}
                              @else 
                                <input 
                                  type="text" 
                                  class="form-control" 
                                  wire:model="prod_discount" />
                              @endif
                            </td>
                            <td>
                              @if($item->id != $idKey)
                                <button 
                                  wire:click="editDiscount({{ $item->id }})"
                                    class="btn btn-sm btn-warning" >
                                    <i class="fas fa-edit"></i>
                                </button>
                              @else
                                <button 
                                  wire:click="saveDiscount"
                                    class="btn btn-sm btn-primary" >
                                    <i class="fas fa-save"></i>
                                </button>
                              @endif
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  {!! $products->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>


