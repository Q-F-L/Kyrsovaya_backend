<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('titel');
            $table->string('continent');
            $table->string('country');
            $table->DECIMAL('price');
            $table->string('topic');
            $table->MEDIUMTEXT('description');
            $table->unsignedBigInteger('touragent_id');

            $table->foreign('touragent_id')->references('id')->on('touragents')->onDelete('cascade');
            $table->string('rating');
            $table->string('ageGroup');
            $table->string('route');
            $table->string('day');
            $table->string('faceImg');
            $table->string('gallery');
            $table->string('included');
            $table->string('notIncluded');
            $table->string('Requirements');
            $table->string('Cancellation');
            $table->string('MaxTourist');
            $table->string('touristCounter');
            $table->string('dates');
            
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
        Schema::dropIfExists('tours');
    }
}
