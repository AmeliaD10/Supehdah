<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CustomizeClinicFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
  public function up()
{
    Schema::create('clinic_fields', function (Blueprint $table) {
        $table->id();
        $table->foreignId('clinic_id')->constrained()->onDelete('cascade');
        $table->string('type'); // e.g. "pet", "treatment"
        $table->string('value');
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
        //
    }
}
