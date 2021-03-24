<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingLogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_logos', function (Blueprint $table) {
            $table->id();
            $table->string("app_name")->nullable();
            $table->string("logo")->nullable();
            $table->boolean("active_logo")->default(1);
            $table->boolean("active_app_name")->default(1);
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
        Schema::dropIfExists('setting_logos');
    }
}
