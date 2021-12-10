<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('sup_name')->comment('ชื่อผู้ผลิต');
            $table->string('sup_tax_number')->nullable()->comment('รหัสภาษี');
            $table->string('sup_email')->nullable()->comment('อีเมล์');
            $table->string('sup_phone')->nullable()->comment('เบอร์โทรศัพท์');
            $table->string('sup_address')->comment('ทีอยู่');
            $table->foreignId('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreignId('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreignId('sub_district_id')->references('id')->on('sub_districts')->onDelete('cascade');
            $table->string('sup_zip_code')->comment('รหัสไปรษณีย์');
            $table->string('sup_contact_name')->comment('ผู้ติดต่อ');
            $table->string('sup_contact_phone')->comment('เบอร์โทรผู้ติดต่อ');
            $table->boolean('sup_status')->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
