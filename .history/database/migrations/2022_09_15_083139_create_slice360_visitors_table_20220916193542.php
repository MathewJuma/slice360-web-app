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
        Schema::create('slice360_visitors', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('ip');
            $table->string('user_id');
            $table->text('platform');
            $table->text('platform_version');
            $table->text('browser');
            $table->text('browser_version');
            $table->text('language');
            $table->text('device');
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
        Schema::dropIfExists('slice360_visitors');
    }
};
