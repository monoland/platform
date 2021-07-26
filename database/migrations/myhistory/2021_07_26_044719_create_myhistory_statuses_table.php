<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyhistoryStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myhistory_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('statusmap_id');
            $table->string('number_sk_cpns');
            $table->date('date_sk_cpns');
            $table->date('tmt_sk_cpns');
            $table->string('official_name');
            $table->string('number_sk_pns');
            $table->date('date_sk_pns');
            $table->date('tmt_sk_pns');
            $table->string('number_sttpl');
            $table->date('date_sttpl');
            $table->string('number_spmt');
            $table->date('date_spmt');
            $table->string('number_pertek_c2th');
            $table->date('date_pertek_c2th');
            $table->string('number_doctor_note');
            $table->date('date_doctor_note');
            $table->string('number_karpeg')->nullable();

            // dokumen
            $table->string('path_docs_spmt'); // spmt
            $table->string('path_docs_sk_cpns')->nullable(); // sk cpns
            $table->string('path_docs_sk_pns')->nullable(); // sk pns
            $table->string('path_docs_nip')->nullable(); // penetapan nip

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
        Schema::dropIfExists('myhistory_statuses');
    }
}
