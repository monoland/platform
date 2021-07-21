<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('module_id');
            $table->foreignId('ability_id');
            $table->nullableMorphs('scopeable');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['user_id', 'module_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_licenses');
    }
}
