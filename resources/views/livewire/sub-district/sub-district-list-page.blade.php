<div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">รายการตำบล</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input 
                        type="text" 
                        class="form-control float-right" 
                        placeholder="Search" 
                        wire:model="searchTerm" />
  
                      <div class="input-group-append">
                          @livewire('sub-district.sub-district-form')
                        <button 
                            type="button" 
                            class="btn btn-primary"
                            data-toggle="modal"  
                            data-target="#modal" 
                            wire:click="$emit('btnCreateSubDistrict')">
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
                        <th>รหัส</th>
                        <th>ชื่อ</th>
                        <th>อำเภอ</th>
                        <th>จังหวัด</th>
                        <th>ไปรษณีย์</th>
                        <th>สถานะ</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($subDistricts as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->subd_code }}</td>
                            <td>{{ $item->subd_name }}</td>
                            <td>{{ $item->district->dist_name }}</td>
                            <td>{{ $item->district->province->prov_name }}</td>
                            <td>{{ $item->subd_zip_code }}</td>
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
                                    data-toggle="modal"  
                                    data-target="#modal" 
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
                  {!! $subDistricts->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>


