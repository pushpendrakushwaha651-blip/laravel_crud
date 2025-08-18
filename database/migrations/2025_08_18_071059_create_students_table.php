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
            Schema::create('students', function (Blueprint $table) {
            $table->id(); // bigint(20) unsigned auto_increment
            $table->string('name', 30); // varchar(30)
            $table->integer('age')->nullable(); // int(11) NULL
            $table->string('email', 50)->nullable(); // varchar(50) NULL
            $table->string('address', 255)->nullable(); // varchar(255) NULL
            $table->string('city', 30); // varchar(30) NOT NULL
            $table->string('phone', 15); // varchar(15) NOT NULL
            $table->string('pdf', 255)->nullable(); // varchar(255) NULL
            // $table->string('password'); // varchar(255) NOT NULL
            $table->string('password')->nullable(); // ✅ allow null

            $table->timestamps(); // created_at, updated_at (timestamp NULL)
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
