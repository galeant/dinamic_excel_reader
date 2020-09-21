<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentToFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_field', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('document_id');
            $table->bigInteger('field_id')->nullable();
            // $table->string('value', 500)->nullable();
            $table->bigInteger('order');
            $table->bigInteger('subdocument_order');

            $table->foreign('document_id')->references('id')->on('document');
            // $table->foreign('field_id')->references('id')->on('document_field');
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
        Schema::dropIfExists('document_to_field');
    }
}
