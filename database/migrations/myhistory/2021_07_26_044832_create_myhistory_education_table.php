<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyhistoryEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myhistory_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('edulevel_id');
            $table->foreignId('edumajor_id');
            $table->string('school_name');
            $table->unsignedMediumInteger('graduation_year');
            $table->date('graduation_date');
            $table->string('certificate_number');
            $table->string('head_title')->nullable();
            $table->string('back_title')->nullable();
            
            // dokumen
            $table->string('path_docs_sk')->nullable(); // sk pencantuman gelar
            $table->string('path_docs_certificate'); // jazah
            $table->string('path_docs_transcript')->nullable(); // transkip
            
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
        Schema::dropIfExists('myhistory_education');
    }
}
