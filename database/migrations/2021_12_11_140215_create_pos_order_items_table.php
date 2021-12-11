<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pos_order_id')->references('id')->on('pos_orders')->onDelete('cascade');
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('psod_item_name')->comment('ชื่อสินค้า');
            $table->string('psod_item_unit')->comment('หน่วย');
            $table->decimal('psod_item_price')->comment('ราคา');
            $table->integer('psod_item_qty')->comment('จำนวน');
            $table->decimal('psod_item_discount')->nullable()->default(0)->comment('ส่วนลด / หน่วย');
            $table->decimal('psod_item_discount_total')->nullable()->default(0)->comment('ยอดรวมส่วนลด');
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
        Schema::dropIfExists('pos_order_items');
    }
}
