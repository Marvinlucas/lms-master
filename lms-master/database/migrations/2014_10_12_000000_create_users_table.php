<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('role_id')->nullable();
            $table->string('middle_initial')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('email')->unique();
            $table->integer('coins')->default(0);
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('birthday')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->string('theme')->default('default');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
