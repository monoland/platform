<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMyprofileBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('myprofile_biodatas', function (Blueprint $table) {
            $table->id();
            // ====================================================
            // data utama
            // ====================================================
            $table->string('nip');
            $table->string('name');
            $table->foreignId('gender_id');
            $table->string('head_title')->nullable();
            $table->string('back_title')->nullable();
            $table->string('born_place')->nullable()->index();
            $table->foreignId('born_city')->nullable();
            $table->date('born_date');
            $table->foreignId('faith_id');
            $table->jsonb('emails');
            $table->text('address')->nullable();
            $table->string('address_rt')->nullable();
            $table->string('address_rw')->nullable();
            $table->foreignId('village_id')->nullable();
            $table->foreignId('district_id')->nullable();
            $table->foreignId('regency_id')->nullable();
            $table->foreignId('province_id')->nullable();
            $table->jsonb('phones');
            $table->string('tax_number')->nullable();
            
            // ====================================================
            // golongan awal
            // ====================================================
            $table->foreignId('candidate_id');

            // ====================================================
            // golongan akhir
            // ====================================================
            $table->foreignId('sectionmap_id');
            $table->foreignId('section_id');
            $table->date('tmt_section');
            $table->unsignedInteger('year_mkg')->default(0);
            $table->unsignedInteger('month_mkg')->default(0);

            // ====================================================
            // jabatan akhir
            // ====================================================
            $table->foreignId('formation_id')->nullable();
            
            $table->foreignId('positiontype_id')->nullable();
            $table->foreignId('positionkind_id')->nullable();
            
            $table->morphs('positionable');
            $table->foreignId('executor_id')->nullable();
            $table->foreignId('functional_id')->nullable();
            $table->foreignId('structural_id')->nullable();
            $table->date('tmt_position');

            $table->foreignId('echelon_id')->nullable();
            $table->date('tmt_echelon');
            
            // unit_kerja
            $table->foreignId('workunit_id')->nullable();
            
            // ====================================================
            // pendidikan akhir
            // ====================================================
            $table->foreignId('edulevel_id');
            $table->foreignId('edumajor_id')->nullable();

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
        Schema::dropIfExists('myprofile_biodatas');
    }
}
