<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyhistoryCouplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myhistory_couples', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('born_place');
            $table->date('born_date');
            $table->string('address');
            $table->jsonb('meta');
            $table->foreignId('gender_id');
            $table->foreignId('faith_id');
            $table->foreignId('marital_id');
            $table->string('card_number');
            $table->boolean('life_status')->default(true);
            $table->unsignedSmallInteger('couple_index');
            $table->boolean('is_pns')->default(false);

            // dokumen
            $table->string('path_docs_akta')->nullable(); // akta nikah

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
        Schema::dropIfExists('myhistory_couples');
    }
}
