<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyhistoryCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myhistory_courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coursemap_id');
            $table->string('name');
            $table->string('organizer_name');
            $table->string('number_certificate');
            $table->unsignedMediumInteger('year_course');
            $table->date('date_begin');
            $table->date('date_end');
            $table->unsignedInteger('duration');

            // dokumen
            $table->string('path_docs_certi')->nullable(); // sk pencantuman gelar

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
        Schema::dropIfExists('myhistory_courses');
    }
}
