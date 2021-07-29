<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationCompositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_compositions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('positionkind_id')->nullable();
            $table->morphs('compositionable');
            $table->foreignId('positiontype_id')->nullable();
            $table->foreignId('workunit_id');
            $table->string('reff')->nullable()->index();
            $table->string('maps')->nullable()->index();
            $table->string('sapk')->nullable()->index();
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
        Schema::dropIfExists('organization_compositions');
    }
}
