<div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">รายการพนักงาน</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input 
                        type="text" 
                        class="form-control float-right" 
                        placeholder="Search" 
                        wire:model="searchTerm" />
  
                      <div class="input-group-append">
                        <a
                            href="{!! route('employee.create') !!}" 
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
                        <th>รูป</th>
                        <th>ชื่อ</th>
                        <th>เบอร์โทร</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td class="text-center">
                              @if ($item->avatar)
                                  <img 
                                    class="profile-user-img img-fluid img-circle" 
                                    src="{{ asset('/images/employees/'.$item->avatar) }}" 
                                    width="100px"/>
                              @endif
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <a
                                  href="{!! route('employee.update',$item->id) !!}"
                                    class="btn btn-sm btn-warning" >
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a
                                  href="{!! route('employee.role.permission',$item->id) !!}"
                                    class="btn btn-sm btn-info" >
                                    <i class="fas fa-user"></i>
                                </a>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  {!! $employees->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>


