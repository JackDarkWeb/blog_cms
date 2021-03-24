<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingContactTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_contact_translations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('setting_contact_id');
            $table->string('locale')->index();

            $table->string("title");
            $table->string("sub_title");
            $table->text("description");

            $table->unique(['setting_contact_id', 'locale']);
            $table->foreign('setting_contact_id')->references('id')->on('setting_contacts')->onDelete('cascade');

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
        Schema::dropIfExists('setting_contact_translations');
    }
}
