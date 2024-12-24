<?php

use App\Models\User;
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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name',length:30)->nullable();
            $table->date('expire_date')->nullable();
            $table->unsignedInteger('price')->nullable();
            $table->boolean('prescription_requirment')->default(0);
            $table->unsignedInteger('on_stock_quantity')->nullable();
            $table->string('details')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('category_id')->references('id')->on('categorys')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
