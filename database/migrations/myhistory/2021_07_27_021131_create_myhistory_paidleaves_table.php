<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyhistoryPaidleavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myhistory_paidleaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paidleavemap_id');
            $table->string('number_sk');
            $table->date('date_sk');
            $table->date('date_start');
            $table->date('date_end');
            $table->date('date_active');
            $table->string('number_pertek');
            $table->date('date_pertek');

            // dokumen
            $table->string('path_docs_cltn')->nullable(); // sk cltn
            $table->string('path_docs_pertek')->nullable(); // pertek

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
        Schema::dropIfExists('myhistory_paidleaves');
    }
}
