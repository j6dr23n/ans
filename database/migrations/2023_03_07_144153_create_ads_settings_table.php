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
        Schema::create('ads_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained()->cascadeOnDelete();
            $table->bigInteger('ads_code')->default(11111);
            $table->boolean('top_720x90_ads')->default(false);
            $table->boolean('dl_720x90_ads')->default(false);
            $table->boolean('feature_160x300_ads')->default(false);
            $table->boolean('post_160x300_ads')->default(false);
            $table->boolean('episode_160x300_ads')->default(false);
            $table->boolean('native_ads')->default(false);
            $table->boolean('adsblock')->default(false);
            $table->boolean('popup_ads')->default(false);
            $table->boolean('social_bar_ads')->default(false);
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
        Schema::dropIfExists('ads_settings');
    }
};
