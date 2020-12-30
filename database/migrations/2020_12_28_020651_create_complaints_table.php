<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('customer_id');
            $table->dateTime('incident_date');
            $table->bigInteger('zipcode');
            $table->json('detail')->nullable();
            $table->float('amount');
            $table->dateTime('pickup_date');
            $table->dateTime('return_date');
            $table->text('description');
            $table->json('incident_types');
            $table->enum('media_type', ['background', 'carousel', 'video', 'none']);
            $table->json('pathOrUrl');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}
