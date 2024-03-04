<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maker;

class MakerController extends Controller
{
    public function index()
    {
        // DBよりMakerテーブルの値を全て取得
        $makers = Maker::orderBy('furigana', 'asc')->get();

        // 取得した値をビュー「maker/index」に渡す
        return view('maker/index', compact('makers'));
    }

    public function edit($id)
    {
      // DBよりURIパラメータと同じIDを持つMakerの情報を取得
      $maker = Maker::findOrFail($id);

      // 取得した値をビュー「maker/edit」に渡す
      return view('maker/edit', compact('maker'));
    }

    public function update(Request $request, $id)
    {
        $maker = Maker::findOrFail($id);
        $maker->name     = $request->name;
        $maker->furigana = $request->furigana;
        $maker->save();

        return redirect("/maker");
    }

    public function destroy($id)
    {
        $maker = Maker::findOrFail($id);
        $maker->delete();

        return redirect("/maker");
    }

    public function create()
    {
        // 空の$makerを渡す
        $maker = new Maker();
        return view('maker/create', compact('maker'));
    }

    public function store(Request $request)
    {
        $maker = new Maker();
        $maker->name     = $request->name;
        $maker->furigana = $request->furigana;
        $maker->save();

        return redirect("/maker");
    }
}
