<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->string('icon')->default('home');
            $table->string('prefix')->index();
            $table->string('path')->index();
            $table->text('describe')->nullable();
            $table->boolean('side')->default(false);
            $table->boolean('dock')->default(false);
            $table->foreignId('module_id');
            $table->nestedSet();
            $table->softDeletes();
            $table->timestamps();

            $table->unique(['prefix', 'path']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_pages');
    }
}
