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
            $table->string('category_id');
            $table->string('city');
            $table->mediumText('brief_description');
            $table->longText('detailed_description');
            $table->string('tags');
            $table->decimal('amount_needed', 15, 2)->default(0);
            $table->decimal('amount_raised', 15, 2)->default(0)->nullable();
            $table->string('number_of_investors')->nullable();
            $table->string('target_investors')->default(0)->nullable();
            $table->decimal('ratings' ,3, 1)->default(0)->nullable();
            $table->integer('viewed')->default(0)->nullable();
            $table->boolean('verified')->default(0); //default not verified
            $table->enum('funding_status', ['opening soon', 'fund raising', 'closing soon', 'funding closed'])->default('opening soon')->nullable();
            $table->boolean('open_for_pledging')->default(0)->comment('1=active, 0=inactive');
            $table->date('pledging_start_date');
            $table->date('pledging_end_date');
            $table->boolean('open_for_funding')->default(0)->comment('1=active, 0=inactive');
            $table->date('funding_start_date')->nullable();
            $table->date('funding_end_date')->nullable();
            $table->string('currency');
            $table->string('website_url')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('vimeo_link')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->boolean('status')->default(0)->comment('1=active, 0=inactive'); //default not active
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
