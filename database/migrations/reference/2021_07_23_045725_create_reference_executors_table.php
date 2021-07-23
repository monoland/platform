<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferenceExecutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_executors', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('slug')->unique();
            $table->unsignedSmallInteger('job_class')->nullable();
            $table->unsignedSmallInteger('age_limit')->nullable();
            $table->string('reff')->nullable()->index();
            $table->string('maps')->nullable()->index();
            $table->string('sapk')->nullable()->index();
            $table->foreignId('postype_id')->nullable();
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('reference_executors');
    }
}
