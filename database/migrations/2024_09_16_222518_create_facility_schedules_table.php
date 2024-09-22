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
        Schema::create('facility_schedule', function (Blueprint $table) {
            // 主キー (AUTO_INCREMENT)
            $table->id('schedule_id'); // 自動で主キーとAUTO_INCREMENTになる

            // 外部キー (facility_id)
            $table->foreignId('facility_id')->nullable()->constrained();

            // 日付関連のカラム
            $table->date('usage_date');

            // 文字列型のカラム
            $table->string('time_slot', 50);

            // ブール型のカラム
            $table->boolean('availability_flag');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_schedules');
    }
};
