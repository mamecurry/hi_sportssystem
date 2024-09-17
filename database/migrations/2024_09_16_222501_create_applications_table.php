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
        Schema::create('applications', function (Blueprint $table) {
    // 主キー (AUTO_INCREMENT)
    $table->id('application_id'); 
    // 自動で主キーとAUTO_INCREMENTになる

    // 外部キー (user_id, facility_id)
    $table->foreignId('user_id')->nullable()->constrained();
    $table->foreignId('facility_id')->nullable()->constrained();

    // ENUM相当のカラム
    $table->enum('application_content', ['施設登録', 'キャンセル']);
    
    // 日時関連のカラム
    $table->dateTime('application_date');

    // ENUM相当のステータス
    $table->enum('status', ['申請中', '承認済み', '却下']);

    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
