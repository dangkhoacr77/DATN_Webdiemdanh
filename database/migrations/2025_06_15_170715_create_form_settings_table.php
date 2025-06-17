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
        Schema::create('form_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained()->onDelete('cascade');
            $table->boolean('enable_time_limit')->default(false);
            $table->integer('time_limit')->nullable(); // phút
            $table->boolean('enable_participant_limit')->default(false);
            $table->integer('participant_limit')->nullable();
            $table->boolean('geo_location')->default(false);
            $table->boolean('device_name')->default(false);
            $table->boolean('email_account')->default(false);
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
        Schema::dropIfExists('form_settings');
    }
};
