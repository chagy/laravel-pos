<div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">รายการโปรโมชั่น</h3>
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input 
                        type="text" 
                        class="form-control float-right" 
                        placeholder="Search" 
                        wire:model="searchTerm" />
  
                      <div class="input-group-append">
                        <a 
                          href="{!! route('promotion.create') !!}"
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
                        <th>วันที่เริ่ม - วันที่สิ้นสุด</th>
                        <th>สถานะ</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($promotions as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->prom_name }}</td>
                            <td>{{ date('d/m/y',strtotime($item->prom_begin)).' - '.date('d/m/y',strtotime($item->prom_end)) }}</td>
                            <td class="text-center">
                              @if ($item->prom_status)
                                <span class="badge badge-success">ใช้งาน</span>
                              @else
                                <span class="badge badge-danger">ยกเลิก</span>
                              @endif
                            </td>
                            <td>
                                <a 
                                  href="{!! route('promotion.edit',$item->id) !!}"
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
                  {!! $promotions->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>


