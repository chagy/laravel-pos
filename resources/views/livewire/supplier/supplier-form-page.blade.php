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
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="sup_name">ชื่อบริษัท</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="sup_name"
                                    id="sup_name" 
                                    placeholder="ชื่อบริษัท" />
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
                                    placeholder="เลขประจำตัวผู้เสียภาษี" />
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
                                    placeholder="อีเมล์" />
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
                                    placeholder="เบอร์โทร" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div class="form-group">
                                <label for="sup_address">ที่อยู่</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="sup_address"
                                    id="sup_address" 
                                    placeholder="ที่อยู่" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="province_id">จังหวัด</label>
                                <select 
                                    class="form-control" 
                                    name="province_id"
                                    id="province_id" >
                                    <option value="">-- เลือกจังหวัด --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="district_id">อำเภอ</label>
                                <select 
                                    class="form-control" 
                                    name="district_id"
                                    id="district_id" >
                                    <option value="">-- เลือกอำเภอ --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="sub_district_id">ตำบล</label>
                                <select 
                                    class="form-control" 
                                    name="sub_district_id"
                                    id="sub_district_id" >
                                    <option value="">-- เลือกตำบล --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="sup_zip_code">รหัสไปรษณีย์</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="sup_zip_code"
                                    id="sup_zip_code" 
                                    placeholder="รหัสไปรษณีย์" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="sup_contact_name">ชื่อผู้ติดต่อ</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="sup_contact_name"
                                    id="sup_contact_name" 
                                    placeholder="ชื่อผู้ติดต่อ" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="sup_contact_phone">เบอร์โทรผู้ติดต่อ</label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    name="sup_contact_phone"
                                    id="sup_contact_phone" 
                                    placeholder="เบอร์โทรผู้ติดต่อ" />
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
                                    id="sup_status" >
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
                </div>
            </div>
        </div>
    </div>
</div>
