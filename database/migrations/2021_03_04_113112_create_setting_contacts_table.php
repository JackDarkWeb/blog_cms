<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_contacts', function (Blueprint $table) {
            $table->id();
            $table->string("thumbnail")->nullable();
            $table->string("company_name")->nullable();
            $table->string("address")->nullable();
            $table->string("phone")->nullable();
            $table->string("website")->nullable();
            $table->string("program")->nullable();
            $table->boolean("required_facultative_field_phone")->default(1);
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
        Schema::dropIfExists('setting_contacts');
    }
}
