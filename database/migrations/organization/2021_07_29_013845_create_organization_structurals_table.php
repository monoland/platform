<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationStructuralsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_structurals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedSmallInteger('job_class')->nullable();
            $table->unsignedSmallInteger('age_limit')->nullable();
            $table->foreignId('echelon_id');
            $table->foreignId('positiontype_id')->nullable();
            $table->foreignId('workunit_id');
            $table->boolean('is_chief')->default(false);
            $table->boolean('active')->default(true);
            $table->nestedSet();
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
        Schema::dropIfExists('organization_structurals');
    }
}
