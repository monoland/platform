<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyhistoryPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myhistory_positions', function (Blueprint $table) {
            $table->id();
            // jabatan
            $table->foreignId('postmap_id');
            
            $table->morphs('positionable');
            $table->foreignId('executor_id')->nullable();
            $table->foreignId('functional_id')->nullable();
            $table->foreignId('structural_id')->nullable();
            
            // unit_kerja
            $table->foreignId('workunit_id');
            $table->foreignId('formation_id');

            // sk
            $table->date('tmt_position'); // jabatan
            $table->date('tmt_inauguration'); // pelantikan
            $table->string('number_sk');
            $table->date('date_sk');

            // dokumen
            $table->string('path_docs_sk')->nullable(); // sk pencantuman gelar
            $table->string('path_docs_inauguration'); // pelantikan
            
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
        Schema::dropIfExists('myhistory_positions');
    }
}
