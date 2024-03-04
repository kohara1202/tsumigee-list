<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Maker;
use App\Models\Hard;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $makers = Maker::orderBy('furigana', 'asc')->get();
        $hards  = Hard::orderBy('name', 'asc')->get();

        # 積み率のための変数
        $gameStats = [
            'gameNum'    => Game::count(),
            'clearNun'   => Game::where('clear', 'クリア')->count(),
            'backlogNun' => Game::where('clear', '積み')->count(),
            'noPlayNun'  => Game::where('clear', '-')->count(),
        ];

        # 絞り込みのための変数
        $makerId = $request->input('filter_maker', 0);
        $hardIds = $request->input('filter_hard', []);
        $clears  = $request->input('filter_clear', []);
        $grades  = $request->input('filter_grade', []);

        $query = Game::query()->with(['maker', 'hard']);
        if ($makerId != 0) {
            $query = $query->where('maker_id', $makerId);
        }
        if (count($hardIds) != 0) {
            $query = $query->wherein('hard_id', $hardIds);
        }
        if (count($clears) != 0) {
            $query = $query->wherein('clear', $clears);
        }
        if (count($grades) != 0) {
            $query = $query->wherein('grade', $grades);
        }

        $games = $query->orderBy('furigana', 'asc')->get();

        return view('game/index', compact('games', 'makers', 'hards', 'gameStats'));
    }

    public function edit($id)
    {
      $game = Game::findOrFail($id);

      $makers = Maker::orderBy('furigana', 'asc')->get();
      $hards  = Hard::orderBy('name', 'asc')->get();

      return view('game/edit', compact('game', 'makers', 'hards'));
    }

    public function update(Request $request, $id)
    {
        $game = Game::findOrFail($id);
        $game->title     = $request->title;
        $game->furigana = $request->furigana;
        $game->maker_id = $request->maker;
        $game->hard_id = $request->hard;
        $game->clear = $request->clear;
        $game->grade = $request->grade;
        $game->note = $request->note;
        $game->save();

        return redirect("/game");
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game->delete();

        return redirect("/game");
    }

    public function create()
    {
        $game = new Game();

        $makers = Maker::orderBy('furigana', 'asc')->get();
        $hards  = Hard::orderBy('name', 'asc')->get();

        return view('game/create', compact('game', 'makers', 'hards'));
    }

    public function store(Request $request)
    {
        $game = new Game();
        $game->title     = $request->title;
        $game->furigana = $request->furigana;
        $game->maker_id = $request->maker;
        $game->hard_id = $request->hard;
        $game->clear = $request->clear;
        $game->grade = $request->grade;
        $game->note = $request->note;
        $game->save();

        return redirect("/game");
    }
}
