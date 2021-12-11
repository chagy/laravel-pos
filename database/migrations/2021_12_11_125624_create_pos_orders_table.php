<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('customer_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('psod_qty')->comment('จำนวนสินค้า');
            $table->decimal('psod_total')->comment('ยอดเงิน');
            $table->decimal('psod_discount_extra')->nullable()->default(0)->comment('ส่วนลดพิเศษ');
            $table->decimal('psod_discount_item')->nullable()->default(0)->comment('ส่วนลดจากรายการสินค้า');
            $table->decimal('psod_vat')->nullable()->default(0)->comment('Vat');
            $table->decimal('psod_vat_amount')->nullable()->default(0)->comment('ยอด Vat');
            $table->decimal('psod_net_total')->comment('ยอดเงินสุทธิ');
            $table->decimal('psod_money')->comment('ลูกค้าจ่าย');
            $table->decimal('psod_change')->comment('เงินทอน');
            $table->text('psod_note')->nullable()->comment('รายละเอียดเพิ่มเติม');
            $table->boolean('psod_status')->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
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
        Schema::dropIfExists('pos_orders');
    }
}
