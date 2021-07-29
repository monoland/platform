<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationFunctionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_functionals', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->string('nickname');
            $table->foreignId('functionalmap_id');
            $table->foreignId('positiontype_id')->nullable();
            $table->foreignId('functionalgrade_id');
            $table->foreignId('functionalexpert_id')->nullable();
            $table->unsignedSmallInteger('job_class')->nullable();
            $table->unsignedSmallInteger('age_limit')->nullable();
            $table->string('reff')->nullable()->index();
            $table->string('maps')->nullable()->index();
            $table->string('sapk')->nullable()->index();
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
        Schema::dropIfExists('organization_functionals');
    }
}
