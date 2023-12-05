<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // 1. id Utama
            $table->string('username', 45)->unique(); // 2. username with unique constraint
            $table->string('fullname', 45); // 3. fullname
            $table->mediumText('password'); // 4. password
            $table->enum('user_type', ['Super Admin', 'Admin']); // 5. user_type
            $table->enum('status', ['Active', 'Inactive'])->default('Active'); // 6. status
            $table->timestamp('last_login')->nullable(); // 7. last_login
            $table->timestamps();

            // Laravel automatically adds primary key constraint for 'id'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}
