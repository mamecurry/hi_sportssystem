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
            $table->uuid('reservation_id')->primary();

            // 外部キー (facility_id, user_id)
            $table->foreignId('facility_id')->nullable()->constrained();
            $table->foreignId('user_id')->nullable()->constrained();

            // 日時関連のカラム
            $table->dateTime('reservation_datetime');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');

            // ENUM相当のステータス
            $table->enum('reservation_status', ['予約済み', 'キャンセル済み', '利用済み']);
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
