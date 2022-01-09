<div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ฟอร์มนำเข้าสินค้า</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form wire:submit.prevent="importExcel">
                        <div class="input-group input-group-md">
                            <input type="file" class="form-control" required wire:model="excel">
                            <span class="input-group-append">
                                <button class="btn btn-info btn-flat">นำเข้า</button>
                            </span>
                        </div>
                    </form>
                </div>
                <div wire:loading wire:target="importExcel"  wire:loading.class="overlay" wire:loading.flex>
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
