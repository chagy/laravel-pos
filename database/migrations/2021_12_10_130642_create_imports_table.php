<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->decimal('impo_total',12,2)->comment('ยอดเงินรวม');
            $table->tinyInteger('impo_process')->comment('สถานะ 0-ยกเลิก 1-เสร็จกระบวนการ 2-รอตรวจสอบ');
            $table->integer('impo_qty')->comment('ยอดจำนวนสินค้า');
            $table->foreignId('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('updated_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('imports');
    }
}
