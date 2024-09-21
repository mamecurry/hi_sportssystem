<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;
    protected $table = 'facilities'; // テーブル名を明示的に指定

    protected $fillable = ['facility_name']; // マスアサイン可能なフィールド
}
