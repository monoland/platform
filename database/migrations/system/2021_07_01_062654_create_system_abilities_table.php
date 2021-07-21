<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemAbilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_abilities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->foreignId('module_id');
            $table->foreignId('role_id');
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['module_id', 'role_id']);
        });

        Schema::create('system_abilities_pages', function (Blueprint $table) {
            $table->foreignId('ability_id');
            $table->foreignId('page_id');
            $table->string('role')->index();
            $table->string('slug')->index();

            $table->primary(['ability_id', 'page_id']);
        });

        Schema::create('system_abilities_permissions', function (Blueprint $table) {
            $table->foreignId('ability_id');
            $table->foreignId('page_id');
            $table->foreignId('permission_id');
            $table->string('role')->index();
            $table->string('slug')->index();

            $table->primary(['ability_id', 'permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_abilities');
        Schema::dropIfExists('system_abilities_pages');
        Schema::dropIfExists('system_abilities_permissions');
    }
}
