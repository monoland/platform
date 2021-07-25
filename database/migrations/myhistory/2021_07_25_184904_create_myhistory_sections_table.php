<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyhistorySectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myhistory_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('biodata_id');
            $table->foreignId('section_id');
            $table->foreignId('promotion_id');
            $table->unsignedMediumInteger('year_mkg')->default(0);
            $table->unsignedMediumInteger('month_mkg')->default(0);
            $table->date('tmt_section');
            $table->string('number_sk');
            $table->date('date_sk');
            $table->string('number_pertek');
            $table->date('date_pertek');
            $table->string('path_docs_sk');
            $table->string('path_docs_pertek');
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
        Schema::dropIfExists('myhistory_sections');
    }
}
