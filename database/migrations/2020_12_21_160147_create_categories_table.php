<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category')->unique();
            $table->boolean('isActive')->default(true);
            $table->json('detail')->nullable();
            $table->integer('order');
            $table->timestamps();
        });

        Schema::create('category_has_incidents', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('incident_id');
            $table->integer('score')->default(1);

            $table->foreign('category_id')
                ->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('incident_id')
                ->references('id')->on('incidents')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->primary(['category_id', 'incident_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_has_incidents');
        Schema::dropIfExists('categories');
    }
}
