<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Drop giá trị cũ của cột 'role'
            DB::table('users')->update(['role' => null]);

            // Thêm giá trị mới cho cột 'role'
            $table->enum('role', ['editor', 'admin', 'user'])->default('user');
        });

        // Cập nhật giá trị mới cho cột 'role'
        DB::table('users')->update(['role' => 'editor']);
    }

    public function down()
    {
        // Nếu cần phục hồi lại giá trị cũ của cột 'role'
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['user'])->default('user');
        });

        // Cập nhật giá trị mới cho cột 'role'
        DB::table('users')->update(['role' => 'editor']);
    }

};
