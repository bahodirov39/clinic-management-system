<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('clinic_id')->nullable()->default(null)->after('id');
            $table->string('first_name')->nullable()->default(null)->after('name');
            $table->string('last_name')->nullable()->default(null)->after('name');
            $table->string('father_name')->nullable()->default(null)->after('name');
            $table->string('phone_number')->nullable()->default(null)->after('email');
            $table->integer('system_status')->nullable()->default(null);
            $table->integer('inner_status')->nullable()->default(null);
            $table->integer('telegram')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('clinic_id');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('father_name');
            $table->dropColumn('phone_number');
            $table->dropColumn('system_status');
            $table->dropColumn('inner_status');
            $table->dropColumn('telegram');
        });
    }
}
