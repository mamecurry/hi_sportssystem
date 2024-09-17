<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('facilities')->insert([
             [
                 
                 'facility_name' => '長島球場',
                  'address' => '長島町1-1',
                  'available_hours' => '09:00-17:00'
             ],
             [
                 
                 'name' => '町営テニスコート害',
                 'address' => '長島町2-2',
                 'available_hours' => '09:00-17:00'
             ],
             [

                 'name' => '町営ゲートボール場',
                 'address' => '長島町3-3',
                 'available_hours' => '09:00-17:00'
             ],
             [
                 
                 'name' => '長島体育館',
                 'address' => '長島町4-4',
                 'available_hours' => '09:00-17:00'
             ],
             [
                 
                 'name' => '平泉小学校・校庭',
                 'address' => '平泉町1-1',
                 'available_hours' => '09:00-17:00'
             ],
             [
                 
                 'name' => '平泉小学校・体育館',
                 'address' => '平泉町1-2',
                 'available_hours' => '09:00-17:00'
             ],
             [
                 
                 'name' => '長島中学校・校庭',
                 'address' => '長島町5-5',
                 'available_hours' => '09:00-17:00'
             ],
             [
                 
                 'name' => '長島中学校・体育館',
                 'address' => '長島町5-6',
                 'available_hours' => '09:00-17:00'
             ],
             [
                 
                 'name' => '平泉中学校・校庭',
                 'address' => '平泉町2-1',
                 'available_hours' => '09:00-17:00'
             ],
             [
                 
                 'name' => '平泉中学校・体育館',
                 'address' => '平泉町2-2',
                 'available_hours' => '09:00-17:00'
             ],
             [
                 
                 'name' => '平泉中学校・柔道場',
                 'address' => '平泉町2-3',
                 'available_hours' => '09:00-17:00'
             ],
          ]);
    }
}
