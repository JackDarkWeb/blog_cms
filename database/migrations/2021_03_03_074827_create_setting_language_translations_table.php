<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingLanguageTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_language_translations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("setting_language_id");

            $table->string("name")->unique();
            $table->string("locale")->index();

            $table->unique(['setting_language_id', 'locale']);
            $table->foreign('setting_language_id')->references('id')->on('setting_languages')->onDelete('cascade');

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
        Schema::dropIfExists('setting_language_translations');
    }
}
