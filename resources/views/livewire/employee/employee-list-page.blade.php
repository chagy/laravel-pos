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
                        <th>ชื่อ</th>
                        <th>เบอร์โทร</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->dist_code }}</td>
                            <td>{{ $item->dist_name }} ( {{ $item->province->prov_name }} )</td>
                            <td>
                                <button 
                                    type="button" 
                                    class="btn btn-sm btn-warning" 
                                    data-toggle="modal"  
                                    data-target="#modal" 
                                    wire:click="$emit('editDistrict',{{ $item->id }})">
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
                  {!! $employees->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>


