<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('clinic_id');
            $table->integer('service_id');
            $table->integer('has_bnpl')->nullable()->default(null);
            $table->integer('duration')->nullable()->default(null);
            $table->integer('status');
            $table->integer('is_dealt')->nullable()->default(null);
            $table->integer('sum_dealt')->nullable()->default(null);
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
        Schema::dropIfExists('procedures');
    }
}
