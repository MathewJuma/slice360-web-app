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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('second_email')->nullable();
            $table->string('second_phone')->nullable();
            $table->string('third_phone')->nullable();
            $table->string('first_address')->nullable();
            $table->string('second_address')->nullable();
            $table->string('city');
            $table->string('country_id');
            $table->mediumText('brief_description');
            $table->string('website_url')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->boolean('status')->default(1)->comment('1=active, 0=inactive'); //default is active
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
        Schema::dropIfExists('user_profiles');
    }
};
