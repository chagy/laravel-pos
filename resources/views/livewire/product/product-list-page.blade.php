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
                          @livewire('category.category-form')
                        <button 
                            type="button" 
                            class="btn btn-primary"
                            data-toggle="modal"  
                            data-target="#modal" 
                            wire:click="$emit('btnCreateCategory')">
                            <i class="fas fa-plus"></i> เพิ่มข้อมูล
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
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>ประเภท</th>
                        <th>สถานะ</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->prod_name }}</td>
                            <td>{{ $item->prod_price }}</td>
                            <td>{{ $item->prod_qty }}</td>
                            <td>{{ $item->category->cate_name }}</td>
                            <td class="text-center">
                              @if ($item->prod_status)
                                <span class="badge badge-success">ใช้งาน</span>
                              @else
                                <span class="badge badge-danger">ยกเลิก</span>
                              @endif
                            </td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-sm btn-warning" 
                                    data-toggle="modal"  
                                    data-target="#modal" 
                                    wire:click="$emit('editCategory',{{ $item->id }})">
                                    <i class="fas fa-edit"></i>
                                </button>
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


