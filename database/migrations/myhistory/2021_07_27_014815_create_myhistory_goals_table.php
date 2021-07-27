<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyhistoryGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myhistory_goals', function (Blueprint $table) {
            $table->id();
            $table->unsignedMediumInteger('year');
            $table->foreignId('postmap_id');
            $table->unsignedFloat('target', 7, 3)->default(0);
            $table->unsignedFloat('orientation', 7, 3)->default(0);
            $table->unsignedFloat('integrity', 7, 3)->default(0);
            $table->unsignedFloat('commitment', 7, 3)->default(0);
            $table->unsignedFloat('discipline', 7, 3)->default(0);
            $table->unsignedFloat('collaboration', 7, 3)->default(0);
            $table->unsignedFloat('behavior', 7, 3)->default(0);
            $table->unsignedFloat('achievement', 7, 3)->default(0);

            // evaluator
            $table->string('evaluator_status');
            $table->string('evaluator_nip');
            $table->string('evaluator_name');
            $table->string('evaluator_position');
            $table->string('evaluator_unor');
            $table->string('evaluator_section');
            $table->string('evaluator_tmt');

            // superior
            $table->string('superior_status');
            $table->string('superior_nip');
            $table->string('superior_name');
            $table->string('superior_position');
            $table->string('superior_unor');
            $table->string('superior_section');
            $table->string('superior_tmt');

            // dokumen
            $table->string('path_docs_skp')->nullable(); // skp
            
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
        Schema::dropIfExists('myhistory_goals');
    }
}
