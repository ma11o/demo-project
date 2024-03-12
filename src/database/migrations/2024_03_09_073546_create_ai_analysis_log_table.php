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
        Schema::create('ai_analysis_log', function (Blueprint $table) {
            $table->id();
            $table->string('image_path', 255)->nullable();
            $table->string('success', 255)->nullable();
            $table->string('message', 255)->nullable();
            $table->integer('class')->nullable();
            $table->decimal('confidence', 5, 4)->nullable();
            $table->unsignedInteger('request_timestamp')->nullable();
            $table->unsignedInteger('response_timestamp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ai_analysis_log');
    }
};
