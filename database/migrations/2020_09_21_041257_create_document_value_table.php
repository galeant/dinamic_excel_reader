<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_value', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('document_field_id');
            $table->string('value', 500)->nullable();
            $table->bigInteger('field_id')->nullable();
            $table->bigInteger('order');
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
        Schema::dropIfExists('document_value');
    }
}
