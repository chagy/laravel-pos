<div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ฟอร์มระดับ และ สิทธิ์</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="role">ระดับ</label>
                                    <select 
                                        
                                        class="form-control @error('role') is-invalid @enderror" 
                                        name="role"
                                        id="role" 
                                        wire:model="role">
                                        <option value="">กรุณาเลือกระดับ</option>
                                        @foreach ($roles as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                    <div id="role_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="permission">สิทธิ์</label>
                                    @foreach ($permissions as $key => $item)
                                        <div class="custom-control custom-checkbox">
                                            <input 
                                                class="custom-control-input" 
                                                type="checkbox" 
                                                wire:model="permission.{{ $key }}"
                                                id="customCheckbox{{ $item->id }}" 
                                                value="{{ $item->name }}">
                                            <label 
                                                for="customCheckbox{{ $item->id }}" 
                                                class="custom-control-label">
                                                {{ $item->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">
                                บันทึกข้อมูล
                            </button>
                        </div>
                    </form>
                </div>
                <div wire:loading wire:target="save"  wire:loading.class="overlay" wire:loading.flex>
                    <div class="d-flex justify-content-center align-items-center">
                        <i class="fas fa-2x fa-sync fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
