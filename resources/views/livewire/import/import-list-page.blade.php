<div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">รายการนำเข้า</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input 
                        type="text" 
                        class="form-control float-right" 
                        placeholder="Search" 
                        wire:model="searchTerm" />
  
                      <div class="input-group-append">
                        <a 
                          href="{!! route('import.create') !!}"
                          class="btn btn-primary">
                            <i class="fas fa-plus"></i> เพิ่มข้อมูล
                          </a>
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
                        <th>ชื่อผู้ผลิต</th>
                        <th>ยอดรวม</th>
                        <th>จำนวน</th>
                        <th>สถานะ</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($imports as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->supplier->sup_name }}</td>
                            <td>{{ $item->impo_total }}</td>
                            <td>{{ $item->impo_qty }}</td>
                            <td class="text-center">
                                @if ($item->impo_status == 2)
                                    <span class="badge badge-warning">รอตรวจสอบ</span>
                                @elseif ($item->impo_status == 1)
                                    <span class="badge badge-success">เสร็จกระบวนการ</span>
                                @else
                                    <span class="badge badge-danger">ยกเลิก</span>
                                @endif
                            </td>
                            <td>
                                <a 
                                  href="{!! route('product.update',$item->id) !!}"
                                    class="btn btn-sm btn-warning" >
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  {!! $imports->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>


