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
                        <a 
                          href="{!! route('import.excel') !!}"
                          class="btn bg-teal">
                          <i class="fas fa-file-excel"></i> Excel
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
                        <th style="width: 100px">Action</th>
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
                                @if ($item->impo_process == 2)
                                    <span class="badge badge-warning">รอตรวจสอบ</span>
                                @elseif ($item->impo_process == 1)
                                    <span class="badge badge-success">เสร็จกระบวนการ</span>
                                @else
                                    <span class="badge badge-danger">ยกเลิก</span>
                                @endif
                            </td>
                            <td>
                              @if ($item->impo_process == 2)
                                <button 
                                  type="button"
                                  wire:click.prevent="saveQty({{$item->id}})"
                                    class="btn btn-sm btn-info" >
                                    <i class="fas fa-check"></i>
                                </button>
                              @endif
                                <a 
                                  href="{!! route('import.update',$item->id) !!}"
                                    class="btn btn-sm btn-warning" >
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <div wire:loading wire:target="saveQty"  wire:loading.class="overlay" wire:loading.flex>
                  <div class="d-flex justify-content-center align-items-center">
                      <i class="fas fa-2x fa-sync fa-spin"></i>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  {!! $imports->links() !!}
                </div>
            </div>
            
        </div>
    </div>
</div>


