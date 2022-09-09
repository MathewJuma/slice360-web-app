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
        Schema::create('opportunity_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opportunity_id');
            $table->unsignedBigInteger('user_id');
            $table->mediumText('review_description');
            $table->enum('description_score', ['0', '1', '2', '3', '4', '5'])->default('0')->nullable();
            $table->integer('capital_score')->default('0')->nullable();
            $table->integer('category_score')->default('0')->nullable();
            $table->integer('timeline_score')->default('0')->nullable();
            $table->decimal('total_score', 3, 1)->default(0)->nullable();
            $table->string('helpful_count')->default(0)->nullable();
            $table->foreign('opportunity_id')->references('id')->on('opportunities')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('opportunity_reviews');
    }
};
