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
            $table->string('email', 50)->unique();
            $table->string('password', 200);

            $table->enum('role', ['Admin', 'Company', 'Customer'])->default('customer');
            $table->boolean('super_admin')->default(false);

            $table->boolean('isActive')->default(true);

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->enum('gender', ['male', 'female', 'others']);
            $table->string('phone', 15);
            $table->text('address');
            $table->string('avatar', 200)->default('boy.png');
            $table->string('license', 200);
            $table->string('about', 300)->nullable();

            $table->string('facebook_id', 191)->unique()->nullable();
            $table->string('twitter_id', 191)->unique()->nullable();
            $table->string('instagram_id', 191)->unique()->nullable();
            $table->string('linkedin_id', 191)->unique()->nullable();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('company_name', 25);
            $table->string('manager_name', 50);
            $table->enum('gender', ['male', 'female', 'others'])->nullable();
            $table->string('phone', 15);
            $table->text('address')->nullable();
            $table->string('avatar', 200)->default('boy.png');
            $table->string('license', 200);
            $table->string('about', 300)->nullable();

            $table->string('facebook_id', 191)->unique()->nullable();
            $table->string('twitter_id', 191)->unique()->nullable();
            $table->string('instagram_id', 191)->unique()->nullable();
            $table->string('linkedin_id', 191)->unique()->nullable();

            $table->unsignedInteger('category_id');
            $table->string('fed_id');
            $table->enum('membership', ['basic', 'extended', 'premium']);

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('first_name', 25);
            $table->string('last_name', 25);
            $table->enum('gender', ['male', 'female', 'others']);
            $table->string('phone', 15);
            $table->text('address');
            $table->string('avatar', 200)->default('boy.png');

            $table->string('facebook_id', 191)->unique()->nullable();
            $table->string('twitter_id', 191)->unique()->nullable();
            $table->string('instagram_id', 191)->unique()->nullable();
            $table->string('linkedin_id', 191)->unique()->nullable();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('admins');
        Schema::dropIfExists('companies');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('users');
    }
}
