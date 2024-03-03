<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // テーブルのクリア
        DB::table('hards')->truncate();
        
        // 初期データ用意（列名をキーとする連想配列）
        $hards = [
            ['name' => 'Switch'],
            ['name' => 'PS5']
        ];

        // 登録
        foreach($hards as $hard) {
            \App\Models\Hard::create($hard);
        }
    }
}
