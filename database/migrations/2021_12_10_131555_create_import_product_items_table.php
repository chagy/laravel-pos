<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportProductItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_product_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('import_id')->references('id')->on('imports')->onDelete('cascade');
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('ipi_name')->nullable()->comment('ชื่อสินค้า');
            $table->integer('ipi_qty')->default(1)->comment('จำนวน');
            $table->string('ipi_unit')->nullable()->comment('หน่วย');
            $table->decimal('ipi_price',8,2)->comment('ราคา/หน่วย');
            $table->decimal('ipi_total',12,2)->comment('ยอดรวม');
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
        Schema::dropIfExists('import_product_items');
    }
}
