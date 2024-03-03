<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // テーブルのクリア
        DB::table('makers')->truncate();
        
        // 初期データ用意（列名をキーとする連想配列）
        $makers = [
            ['name'     => '任天堂',
             'furigana' => 'ニンテンドウ'],
            ['name'     => 'コナミデジタルエンタテインメント',
             'furigana' => 'コナミデジタルエンタテインメント']
        ];

        // 登録
        foreach($makers as $maker) {
            \App\Models\Maker::create($maker);
        }
    }
}
