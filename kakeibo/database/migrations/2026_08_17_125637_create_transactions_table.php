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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained();   // categories.id への紐付け
            $table->string('type')->default('expense');        // income / expense
            $table->unsignedInteger('amount');                 // 金額（円）
            $table->date('occurred_at');                       // 取引が発生した日
            $table->string('note')->nullable();                // メモ（任意）
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
