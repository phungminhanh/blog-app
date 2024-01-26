<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('teaser');
            $table->text('content');
            $table->string('title');
            $table->timestamps();
            $table->foreignId('id_author')->constrained('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}


