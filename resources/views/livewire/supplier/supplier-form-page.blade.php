<div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ฟอร์มผู้ผลิต</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sup_name">ชื่อบริษัท</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('sup_name') is-invalid @enderror" 
                                        name="sup_name"
                                        id="sup_name" 
                                        placeholder="ชื่อบริษัท" 
                                        wire:model="sup_name"/>
                                    @error('sup_name')
                                    <div id="sup_name_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sup_tax_number">เลขประจำตัวผู้เสียภาษี</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        name="sup_tax_number"
                                        id="sup_tax_number" 
                                        placeholder="เลขประจำตัวผู้เสียภาษี" 
                                        wire:model="sup_tax_number"/>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sup_email">อีเมล์</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        name="sup_email"
                                        id="sup_email" 
                                        placeholder="อีเมล์" 
                                        wire:model="sup_email"/>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sup_phone">เบอร์โทร</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        name="sup_phone"
                                        id="sup_phone" 
                                        placeholder="เบอร์โทร" 
                                        wire:model="sup_phone"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="sup_address">ที่อยู่</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('sup_address') is-invalid @enderror" 
                                        name="sup_address"
                                        id="sup_address" 
                                        placeholder="ที่อยู่" 
                                        wire:model="sup_address"/>
                                    @error('sup_address')
                                    <div id="sup_address_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="province_id">จังหวัด</label>
                                    <select 
                                        class="form-control @error('province_id') is-invalid @enderror" 
                                        name="province_id"
                                        id="province_id" 
                                        wire:model="province_id">
                                        <option value="">-- เลือกจังหวัด --</option>
                                        @foreach ($provinces as $prov)
                                            <option value="{{ $prov->id }}">{{ $prov->prov_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                    <div id="province_id_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="district_id">อำเภอ</label>
                                    <select 
                                        class="form-control @error('district_id') is-invalid @enderror" 
                                        name="district_id"
                                        id="district_id" 
                                        wire:model="district_id">
                                        <option value="">-- เลือกอำเภอ --</option>
                                        @foreach ($districts as $dist)
                                        <option value="{{ $dist->id }}">{{ $dist->dist_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('district_id')
                                    <div id="district_id_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sub_district_id">ตำบล</label>
                                    <select 
                                        class="form-control @error('sub_district_id') is-invalid @enderror" 
                                        name="sub_district_id"
                                        id="sub_district_id"
                                        wire:model="sub_district_id">
                                        <option value="">-- เลือกตำบล --</option>
                                        @foreach ($subDistricts as $subd)
                                        <option value="{{ $subd->id }}">{{ $subd->subd_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sub_district_id')
                                    <div id="sub_district_id_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sup_zip_code">รหัสไปรษณีย์</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('sup_zip_code') is-invalid @enderror" 
                                        name="sup_zip_code"
                                        id="sup_zip_code" 
                                        placeholder="รหัสไปรษณีย์" 
                                        wire:model="sup_zip_code"/>
                                    @error('sup_zip_code')
                                    <div id="sup_zip_code_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sup_contact_name">ชื่อผู้ติดต่อ</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('sup_contact_name') is-invalid @enderror" 
                                        name="sup_contact_name"
                                        id="sup_contact_name" 
                                        placeholder="ชื่อผู้ติดต่อ" 
                                        wire:model="sup_contact_name"/>
                                    @error('sup_contact_name')
                                    <div id="sup_contact_name_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sup_contact_phone">เบอร์โทรผู้ติดต่อ</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('sup_contact_phone') is-invalid @enderror" 
                                        name="sup_contact_phone"
                                        id="sup_contact_phone" 
                                        placeholder="เบอร์โทรผู้ติดต่อ" 
                                        wire:model="sup_contact_phone"/>
                                    @error('sup_contact_phone')
                                    <div id="sup_contact_phone_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="sup_status">สถานะ</label>
                                    <select 
                                        class="form-control" 
                                        name="sup_status"
                                        id="sup_status" 
                                        wire:model="sup_status">
                                        <option value="1">ใช้งาน</option>
                                        <option value="0">ยกเลิก</option>
                                    </select>
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
