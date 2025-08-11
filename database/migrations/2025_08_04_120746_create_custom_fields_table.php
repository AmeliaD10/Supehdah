<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
Schema::create('custom_fields', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('clinic_id');
    $table->string('type'); // pet, treatment, etc.
    $table->string('value');
    $table->timestamps();

    $table->foreign('clinic_id')->references('id')->on('clinic_infos')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_fields');
    }
}
