<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');

            $table->enum('status',[
                'DRAFT',
                'PUBLIC',
                'HIDDEN',
                'PROGRAM'
            ])->default('DRAFT');

            $table->mediumText('excerpt')->nullable();
            $table->text('body')->nullable();
            $table->mediumText('iframe')->nullable();
            $table->timestamp('published_at')->nullable();
            
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            

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
        Schema::dropIfExists('posts');
    }
}
