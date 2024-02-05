<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Đổi tên cột 'new_role' thành 'role'
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('new_role', 'role');
        });
    }

    public function down()
    {
        // Nếu cần phục hồi lại tên cũ của cột 'role'
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('role', 'new_role');
        });
    }
};
