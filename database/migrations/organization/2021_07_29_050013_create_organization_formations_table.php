<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationFormationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_formations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->foreignId('positionkind_id');
            $table->foreignId('composition_id');
            $table->morphs('formationable');
            $table->unsignedMediumInteger('need')->default(0);
            $table->unsignedMediumInteger('fill')->default(0);
            $table->unsignedMediumInteger('mark')->default(0);
            $table->mediumInteger('balance')->default(0);
            $table->unsignedMediumInteger('over')->default(0);
            $table->jsonb('meta')->nullable();
            $table->boolean('assigned')->default(false);
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
        Schema::dropIfExists('organization_formations');
    }
}
