<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyhistoryAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myhistory_awards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('awardmap_id');
            $table->unsignedMediumInteger('year');
            $table->string('number_sk');
            $table->date('date_sk');

            // dokumen
            $table->string('path_docs_award')->nullable(); // skp

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
        Schema::dropIfExists('myhistory_awards');
    }
}
