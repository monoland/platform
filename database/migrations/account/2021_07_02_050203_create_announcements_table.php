<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('snippet');
            $table->text('article');
            $table->jsonb('meta')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('workunit_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('users_announcements', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('announcement_id');
            $table->timestamp('read_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('announcements');
    }
}
