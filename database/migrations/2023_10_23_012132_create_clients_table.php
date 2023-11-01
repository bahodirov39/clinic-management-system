<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->integer('clinic_id');
            $table->integer('first_name');
            $table->integer('last_name')->nullable()->default(null);
            $table->integer('father_name')->nullable()->default(null);
            $table->integer('phone_number')->nullable()->default(null);
            $table->integer('visits')->nullable()->default(null);
            $table->integer('status')->nullable()->default(null);
            $table->integer('payment')->nullable()->default(null);
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
        Schema::dropIfExists('clients');
    }
}
