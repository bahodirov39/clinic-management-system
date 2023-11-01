<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->integer('owner_id');
            $table->string('name');
            $table->string('logo')->nullable()->default(null);
            $table->string('banner')->nullable()->default(null);
            $table->string('location')->nullable()->default(null);
            $table->string('working_hours')->nullable()->default(null);
            $table->json('phone_numbers')->nullable()->default(null);
            $table->text('description_uz')->nullable()->default(null);
            $table->text('description_ru')->nullable()->default(null);
            $table->text('description_en')->nullable()->default(null);
            $table->integer('is_promoted')->nullable()->default(null);
            $table->integer('is_banned')->nullable()->default(null);
            $table->integer('currency')->nullable()->default(null);
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
        Schema::dropIfExists('clinics');
    }
}
