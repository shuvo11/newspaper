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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('news_title',255);
            $table->tinyInteger('category_id');
            $table->text('news_short_description');
            $table->text('news_description');
            $table->string('news_media',256);
            $table->string('created_by',256);
            $table->tinyInteger('hit_count');
            $table->tinyInteger('latest_news');
            $table->tinyInteger('share_count');
            $table->string('news_tag',256);
            $table->dateTime('published_time');
            $table->boolean('publication_status');
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
        Schema::dropIfExists('news');
    }
};
