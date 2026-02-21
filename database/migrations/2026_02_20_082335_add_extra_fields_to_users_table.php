<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Adding your new columns
            $table->string('prof_pic')->default('default.png'); 
            $table->enum('role', ['admin', 'user'])->default('user'); 
            $table->integer('phone_number')->nullable(); 
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Always define the "rollback" so you can undo this if needed
            $table->dropColumn(['prof_pic', 'role', 'phone_number']);
        });
    }
};
