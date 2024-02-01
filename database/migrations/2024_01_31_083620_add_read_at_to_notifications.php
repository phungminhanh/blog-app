<?php

// Trong tệp migration mới
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReadAtToNotifications extends Migration
{
    public function up()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->timestamp('read_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('notifications', function (Blueprint $table) {
            $table->dropColumn('read_at');
        });
    }
}
