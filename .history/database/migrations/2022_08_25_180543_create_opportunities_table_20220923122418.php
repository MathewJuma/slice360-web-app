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
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('country_id');
            $table->string('city');
            $table->string('currency');
            $table->string('category_id');
            $table->mediumText('brief_description');
            $table->longText('detailed_description');
            $table->string('tags');
            $table->decimal('amount_needed', 15, 2)->default(0);
            $table->decimal('amount_raised', 15, 2)->default(0)->nullable();
            $table->string('number_of_investors')->nullable();
            $table->string('target_investors')->default(0)->nullable();
            $table->date('pledging_start_date');
            $table->date('pledging_end_date');
            $table->boolean('open_for_funding')->default(0)->comment('1=active, 0=inactive');
            $table->date('funding_start_date')->nullable();
            $table->date('funding_end_date')->nullable();
            $table->string('website_url')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('vimeo_link')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->integer('click_views')->default(0)->nullable();
            $table->enum('funding_status', ['opening soon', 'fund raising', 'closing soon', 'funding closed'])->default('opening soon')->nullable();
            $table->enum('open_for_pledging', ['Active', 'Inactive'])->default('Inactive')->nullable(); //default not active
            $table->enum('verified', ['Yes', 'No'])->default('No')->nullable(); //default not active
            $table->enum('locked', ['Yes', 'No'])->default('No')->nullable(); //default not active
            $table->enum('published', ['Yes', 'No'])->default('No')->nullable(); //default not active
            $table->enum('status', ['Active', 'Inactive'])->default('Inactive')->nullable(); //default not active
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
        Schema::dropIfExists('opportunities');
    }
};
