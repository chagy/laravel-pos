<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsernameColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('users_email_unique');
            $table->string('email')->nullable()->change();

            $table->string('username')->after('email_verified_at')->unique();
            $table->string('phone')->comment('เบอร์โทรศัพท์มือถือ')->after('remember_token');
            $table->string('address')->comment('ทีอยู่')->after('phone');
            $table->foreignId('province_id')->after('address')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreignId('district_id')->after('province_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreignId('sub_district_id')->after('district_id')->references('id')->on('sub_districts')->onDelete('cascade');
            $table->string('avatar')->nullable()->comment('รูป')->after('sub_district_id');
            $table->tinyInteger('type')->default(2)->comment('1-employee 2-customer')->after('avatar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->unique()->change();
            $table->dropForeing('users_province_id_foreign');
            $table->dropForeing('users_district_id_foreign');
            $table->dropForeing('users_sub_district_id_foreign');

            $table->dropColumn('username');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->dropColumn('province_id');
            $table->dropColumn('district_id');
            $table->dropColumn('sub_district_id');
            $table->dropColumn('avatar');
            $table->dropColumn('type');
        });
    }
}
