<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string('prom_name')->comment('ชื่อโปรโมชั่น');
            $table->date('prom_begin')->comment('เริ่มวันที่');
            $table->date('prom_end')->comment('สิ้นสุดวันที');
            $table->boolean('prom_status')->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
            $table->text('prom_desc')->nullable()->comment('รายละเอียดเพิ่มเติม');
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
        Schema::dropIfExists('promotions');
    }
}
