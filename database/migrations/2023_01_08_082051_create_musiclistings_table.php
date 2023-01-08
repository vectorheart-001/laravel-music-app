<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musiclistings', function (Blueprint $table) {
            $table->id();
            $table-> string('artist');
            $table-> string('track_name');
            $table->string('album');
            $table->string('path');
            $table->foreignId('users_id')->references('id')->on('users');
            $table->string('track_link');

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
        Schema::dropIfExists('musiclistings');
    }
};
