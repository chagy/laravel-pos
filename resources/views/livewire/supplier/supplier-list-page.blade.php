<div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">รายการผู้ผลิต</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input 
                        type="text" 
                        class="form-control float-right" 
                        placeholder="Search" 
                        wire:model="searchTerm" />
  
                      <div class="input-group-append">
                        <a 
                          href="{!! route('supplier.create') !!}"
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
                        <th>ชื่อบริษัท</th>
                        <th>ชื่อผู้ติดต่อ</th>
                        <th>เบอร์โทรผู้ติดต่อ</th>
                        <th>สถานะ</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($suppliers as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->sup_name }}</td>
                            <td>{{ $item->sup_contact_name }}</td>
                            <td>{{ $item->sup_contact_phone }}</td>
                            <td class="text-center">
                              @if ($item->subd_status)
                                <span class="badge badge-success">ใช้งาน</span>
                              @else
                                <span class="badge badge-danger">ยกเลิก</span>
                              @endif
                            </td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-sm btn-warning" 
                                    wire:click="$emit('editSubDistrict',{{ $item->id }})">
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
                  {!! $suppliers->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>


