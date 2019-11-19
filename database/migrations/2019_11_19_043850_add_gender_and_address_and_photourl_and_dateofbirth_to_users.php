<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGenderAndAddressAndPhotourlAndDateofbirthToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('gender',['female','male'])->nullable();
            $table->longText('address')->nullable()->default('');
            $table->string('photourl', 100)->nullable()->default('');
            $table->date('dateofbirth')->nullable();
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
            //
            $table->dropColumn(['gender','address','photourl','dateofbirth']);
        });
    }
}
