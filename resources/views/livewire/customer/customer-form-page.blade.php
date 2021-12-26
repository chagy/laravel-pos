<div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">ฟอร์มลูกค้า</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form wire:submit.prevent="save">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">ชื่อ</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('name') is-invalid @enderror" 
                                        name="name"
                                        id="name" 
                                        placeholder="ชื่อ" 
                                        wire:model="name"/>
                                    @error('name')
                                    <div id="name_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="email">อีเมล์</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        name="email"
                                        id="email" 
                                        placeholder="อีเมล์" 
                                        wire:model="email"/>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('username') is-invalid @enderror" 
                                        name="username"
                                        id="username" 
                                        placeholder="Username" 
                                        wire:model="username"/>
                                    @error('username')
                                    <div id="username_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('password') is-invalid @enderror" 
                                        name="password"
                                        id="password" 
                                        placeholder="Password" 
                                        wire:model="password"/>
                                    @error('password')
                                    <div id="password_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="phone">เบอร์โทร</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('phone') is-invalid @enderror" 
                                        name="phone"
                                        id="phone" 
                                        placeholder="เบอร์โทร" 
                                        wire:model="phone"/>
                                    @error('phone')
                                    <div id="phone_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="form-group">
                                    <label for="address">ที่อยู่</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('address') is-invalid @enderror" 
                                        name="address"
                                        id="address" 
                                        placeholder="ที่อยู่" 
                                        wire:model="address"/>
                                    @error('address')
                                    <div id="address_validation" class="invalid-feedback">
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
                                    <label for="zip_code">รหัสไปรษณีย์</label>
                                    <input 
                                        type="text" 
                                        class="form-control @error('zip_code') is-invalid @enderror" 
                                        name="zip_code"
                                        id="zip_code" 
                                        placeholder="รหัสไปรษณีย์" 
                                        wire:model="zip_code"/>
                                    @error('zip_code')
                                    <div id="zip_code_validation" class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="avatar">รูป</label>
                                    <input 
                                        type="file" 
                                        class="form-control" 
                                        name="avatar"
                                        id="avatar" 
                                        wire:model="avatar" />
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
