<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('sett_name')->comment('ชื่อร้าน');
            $table->string('sett_phone')->comment('เบอร์โทรศัพท์');
            $table->string('sett_tax_id')->nullable()->comment('รหัสภาษี');
            $table->decimal('sett_vat')->nullable()->default(0)->comment('vat');
            $table->string('sett_owner')->comment('ชื่อเจ้าของ');
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
        Schema::dropIfExists('settings');
    }
}
