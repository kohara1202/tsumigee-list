<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // テーブルのクリア
        DB::table('games')->truncate();
        
        // 初期データ用意（列名をキーとする連想配列）
        $games = [
            ['title'    => 'スーパーマリオ オデッセイ',
             'furigana' => 'スーパーマリオオデッセイ',
             'maker_id' => '1',
             'hard_id'  => '1',
             'clear'    => 'clear',
             'grade'    => 'S+',
             'note'     => 'スーパーマリオ オデッセイセット'],
            ['title'    => 'スーパーボンバーマン R 2',
             'furigana' => 'スーパーボンバーマンアール2',
             'maker_id' => '2',
             'hard_id'  => '2',
             'clear'    => 'backlog',
             'grade'    => '-']
        ];

        // 登録
        foreach($games as $game) {
            \App\Models\Game::create($game);
        }
    }
}
