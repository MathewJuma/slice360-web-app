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
        Schema::create('opportunity_timelines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opportunity_id');
            $table->string('title');
            $table->mediumText('timeline_description');
            $table->enum('timeline_status', ['Executed', 'In Progress', 'Starting Soon', 'Not Yet'])->default('Not yet')->nullable();
            $table->foreign('opportunity_id')->references('id')->on('opportunities')->onDelete('cascade');
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
        Schema::dropIfExists('opportunity_timelines');
    }
};
