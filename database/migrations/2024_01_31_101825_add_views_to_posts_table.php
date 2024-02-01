<?php

// Trong file migrations/xxxx_xx_xx_add_views_to_posts_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddViewsToPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('view')->default(0);
            $table->unsignedBigInteger('view_daily')->default(0);
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('view');
            $table->dropColumn('view_daily');
        });
    }
}
