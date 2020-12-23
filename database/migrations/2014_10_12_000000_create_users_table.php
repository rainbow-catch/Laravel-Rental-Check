<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->enum('gender', ['male', 'female', 'others'])->nullable();
            $table->string('phone', 15);
            $table->text('address')->nullable();
            $table->string('email', 50)->unique();
            $table->string('password', 200);
            $table->string('avatar', 200)->default('boy.png');
            $table->string('about', 300)->nullable();
            $table->string('facebook_id', 191)->unique()->nullable();
            $table->string('twitter_id', 191)->unique()->nullable();
            $table->enum('role', ['admin', 'company', 'customer'])->default('customer');
            $table->boolean('super_admin')->default(false);
            $table->enum('status', ['registered', 'blocked', 'allowed', 'completed'])->default("registered");
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
