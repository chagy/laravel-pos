<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_districts', function (Blueprint $table) {
            $table->id();
            $table->integer('subd_code')->nullable()->comment('รหัสตำบล');
            $table->string('subd_name')->comment('ชื่อตำบล');
            $table->text('subd_desc')->nullable()->comment('รายละเอียดเพิ่มเติม');
            $table->boolean('subd_status')->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->integer('subd_zip_code')->comment('รหัสไปรษณีย์');
            $table->foreignId('district_id')->references('id')->on('districts')->onDelete('cascade');
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
        Schema::dropIfExists('sub_districts');
    }
}
