<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hard;

class HardController extends Controller
{
    public function index()
    {
        // DBよりHardテーブルの値を全て取得
        $hards = Hard::orderBy('name', 'asc')->get();

        // 取得した値をビュー「hard/index」に渡す
        return view('hard/index', compact('hards'));
    }

    public function edit($id)
    {
      // DBよりURIパラメータと同じIDを持つHardの情報を取得
      $hard = Hard::findOrFail($id);

      // 取得した値をビュー「hard/edit」に渡す
      return view('hard/edit', compact('hard'));
    }

    public function update(Request $request, $id)
    {
        $hard = Hard::findOrFail($id);
        $hard->name = $request->name;
        $hard->save();

        return redirect("/hard");
    }

    public function destroy($id)
    {
        $hard = Hard::findOrFail($id);
        $hard->delete();

        return redirect("/hard");
    }

    public function create()
    {
        // 空の$hardを渡す
        $hard = new Hard();
        return view('hard/create', compact('hard'));
    }

    public function store(Request $request)
    {
        $hard = new Hard();
        $hard->name = $request->name;
        $hard->save();

        return redirect("/hard");
    }
}
