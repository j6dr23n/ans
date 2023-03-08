<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_settings', function (Blueprint $table) {
            $table->bigInteger('monthly_cost')->after('bandwidth_usage')->nullable();
            $table->bigInteger('lifetime_cost')->after('monthly_cost')->nullable();
            $table->bigInteger('kpay')->after('lifetime_cost')->nullable();
            $table->bigInteger('wavepay')->after('kpay')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_settings', function (Blueprint $table) {
            //
        });
    }
};
