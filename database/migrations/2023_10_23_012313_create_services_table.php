<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('clinic_id');
            $table->json('dentist_id')->nullable()->default(null);
            $table->string('name_uz');
            $table->string('name_ru');
            $table->string('name_en')->nullable()->default(null);
            $table->text('description_uz')->nullable()->default(null);
            $table->text('description_ru')->nullable()->default(null);
            $table->text('description_en')->nullable()->default(null);
            $table->string('duration')->nullable()->default(null);
            $table->integer('price');
            $table->integer('bnpl_percent')->nullable()->default(null);
            $table->integer('rating')->nullable()->default(null);
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
        Schema::dropIfExists('services');
    }
}
