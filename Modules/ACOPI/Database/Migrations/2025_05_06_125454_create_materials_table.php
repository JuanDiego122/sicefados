<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id(); // Primary key

            $table->string('name');
            $table->string('description')->nullable();
            $table->decimal('weight', 8, 2); // Weight in kg
            $table->date('entry_date'); // Date of entry
            $table->string('location'); // Storage location
            $table->string('charge'); 

            // Foreign keys
            $table->unsignedBigInteger('classification_id');
            $table->unsignedBigInteger('cellar_id');

            // Foreign key constraints
            $table->foreign('classification_id')->references('id')->on('classifications')->onDelete('cascade');
            $table->foreign('cellar_id')->references('id')->on('cellars')->onDelete('cascade');

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
        Schema::dropIfExists('materials');
    }
}
