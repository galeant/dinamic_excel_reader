<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('subsidiaries_id')->unisigned()->nullable();
            $table->string('year');
            $table->string('month');
            $table->bigInteger('main_category_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('order')->nullable();
            $table->timestamps();

            $table->foreign('subsidiaries_id')->references('id')->on('subsidiaries');
            // $table->foreign('type_id')->references('id')->on('document_type');
            $table->foreign('category_id')->references('id')->on('document_category');
            $table->foreign('main_category_id')->references('id')->on('document_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document');
    }
}
