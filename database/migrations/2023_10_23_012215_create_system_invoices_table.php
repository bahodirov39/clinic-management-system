<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('clinic_id')->nullable()->default(null);
            $table->integer('amount')->nullable()->default(null);
            $table->integer('payment')->nullable()->default(null);
            $table->integer('currency')->nullable()->default(null);
            $table->integer('status')->nullable()->default(null);
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
        Schema::dropIfExists('system_invoices');
    }
}
