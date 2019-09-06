<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title', 250)->nullable();
            $table->string('title_long', 600)->nullable();
            $table->string('slug', 250)->nullable();
            $table->string('feature_image', 250)->nullable();
            $table->string('visibility', 50)->nullable();
            $table->string('status', 50)->nullable();
            $table->unsignedInteger('author_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->longText('content')->nullable();
            $table->longText('js_header')->nullable();
            $table->longText('js_footer')->nullable();
            $table->longText('css_header')->nullable();
            $table->longText('css_footer')->nullable();
            $table->dateTime('posted_at')->nullable();
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
        Schema::drop('articles');
    }
}
