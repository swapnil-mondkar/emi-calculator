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
        Schema::create('emi_combinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('month_id');
            $table->integer('min_amount');
            $table->integer('max_amount');
            $table->decimal('interest_rate', 5, 2);
            $table->timestamps();

            $table->foreign('month_id')->references('id')->on('months')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emi_combinations');
    }
};
