<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string("config_type");
            $table->string("position_1")->nullable();
            $table->string("position_2")->nullable();
            $table->string("signature_1")->nullable();
            $table->string("signature_2")->nullable();
            $table->string("name_1")->nullable();
            $table->string("name_2")->nullable();
            $table->string("logo")->nullable();
            $table->string("background")->nullable();
            $table->string("config_category")->default('global');
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
        Schema::dropIfExists('certificates');
    }
};

