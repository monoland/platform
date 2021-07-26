<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyhistoryReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myhistory_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reviewmap_id');
            $table->string('name');
            $table->date('date_begin');
            $table->date('date_end');
            $table->string('number_sk');
            $table->date('date_sk');
            $table->string('number_pertek');
            $table->date('date_pertek');
            $table->unsignedMediumInteger('year_mk');
            $table->unsignedMediumInteger('month_mk');
            
            // dokumen
            $table->string('path_docs_pmk')->nullable(); // sk pencantuman gelar

            $table->foreignId('biodata_id');
            $table->softDeletes();
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
        Schema::dropIfExists('myhistory_reviews');
    }
}
