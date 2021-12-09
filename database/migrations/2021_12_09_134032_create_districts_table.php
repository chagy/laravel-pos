<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->integer('dist_code')->nullable()->comment('รหัสอำเภอ');
            $table->string('dist_name')->comment('ชื่ออำเภอ');
            $table->text('dist_desc')->nullable('รายละเอียดเพิ่มเติม');
            $table->boolean('dist_status')->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->foreignId('province_id')->references('id')->on('provinces')->onDelete('cascade');
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
        Schema::dropIfExists('districts');
    }
}
