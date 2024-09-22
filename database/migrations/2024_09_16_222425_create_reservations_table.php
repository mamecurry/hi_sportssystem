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
        Schema::create('reservations', function (Blueprint $table) {
            // 主キー (UUID)
            $table->uuid('id')->primary();

            // 外部キー (facility_id, user_id)
            $table->foreignId('facility_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();

            // 日時関連のカラム
            $table->dateTime('reservation_datetime')->nullable();
            $table->dateTime('start_datetime')->nullable();
            $table->dateTime('end_datetime')->nullable();
            $table->timestamps();  // created_at, updated_at を自動生成
            $table->string('reservation_time');

            // ENUM相当のステータス
            $table->enum('reservation_status', ['予約済み', 'キャンセル済み', '利用済み'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
