<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('prod_name')->unique()->comment('ชื่อสินค้า');
            $table->string('prod_unit')->comment('หน่วย');
            $table->decimal('prod_cost',8,2)->comment('ราคาต้นทุน');
            $table->decimal('prod_price',8,2)->comment('ราคาขาย');
            $table->integer('prod_qty')->comment('จำนวน');
            $table->decimal('prod_discount',8,2)->nullable()->default(0)->comment('ลดราคา');
            $table->string('prod_bar_code')->nullable()->comment('Barcode');
            $table->string('prod_picture')->nullable()->comment('รูป');
            $table->boolean('prod_status')->default(true)->comment('สถานะ True-ใช้งาน False-ยกเลิก');
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
        Schema::dropIfExists('products');
    }
}
