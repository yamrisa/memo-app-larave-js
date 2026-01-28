<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void //テーブル作る時
    {
        Schema::create('memos', function (Blueprint $table) {
            $table->id();
            $table->string('content'); //メモの本文が入る
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //テーブル戻すとき
    {
        Schema::dropIfExists('memos');
    }
};
