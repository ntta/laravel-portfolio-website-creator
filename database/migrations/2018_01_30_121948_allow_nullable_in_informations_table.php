<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllowNullableInInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('general_informations', function (Blueprint $table) {
            $table->string('img')->nullable()->change();
            $table->string('banner')->nullable()->change();
            $table->date('dob')->nullable()->change();
            $table->string('job')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('phone')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_informations', function (Blueprint $table) {
            //
        });
    }
}
