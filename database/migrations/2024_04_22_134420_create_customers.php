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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->date('birth')->nullable(false);
            $table->char('phone',length:10)->nullable(false);
            $table->string('first_name',length:20)->nullable(false);
            $table->string('last_name',length:20)->nullable(false);
            $table->unsignedInteger('balance')->nullable(false);
            $table->string('location',length:100)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
