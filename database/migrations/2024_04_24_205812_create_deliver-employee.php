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
        Schema::create('deliver-employee',function (Blueprint $table) {
            $table->id();
            $table->string('name',length:50)->nullable(false);
            $table->unsignedInteger('wage')->nullable(false);
            $table->string('address',length:100)->nullable(false);
            $table->string('governorate');
            $table->foreign('governorate')->references('governorate')->on('shipping-dep')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliver-employee');
    }
};
