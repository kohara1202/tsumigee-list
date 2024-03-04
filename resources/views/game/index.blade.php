<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            <span>積みゲー</span>
            <a href="/game/create"><x-primary-button>New</x-primary-button></a>
        </h2>
    </x-slot>

    <div class="text-lg py-6 mx-3 text-gray-200">   
        <div class="card card-body bg-black">
            <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
                絞り込み
            </h3>
            <form action="/game" method="get">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table>
                    <tr>
                        <td align="right">メーカー：</td>
                        <td>
                            <select name="filter_maker" required class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value=0></option>
                                @foreach($makers as $maker)
                                    <option value="{{ $maker->name }}">
                                        {{ $maker->name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td align="right">ハード：</td>
                        <td>
                            @foreach ($hards as $hard)
                                <input type="checkbox" name="filter_hard[]" value="{{ $hard->id }}">
                                {{ $hard->name }}
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <td align="right">状態：</td>
                        <td>
                            @foreach (config('const.grades') as $grade)
                                <input type="checkbox" name="filter_grade[]" value="{{ $grade }}">
                                {{ $grade }}
                            @endforeach
                        </td>
                    </tr>

                    <tr>
                        <td align="right">評価：</td>
                        <td>
                            @foreach (config('const.clears') as $clear)
                                <input type="checkbox" name="filter_clear[]" value="{{ $clear }}">
                                {{ $clear }}
                            @endforeach
                        </td>
                    </tr>
                </table>
                <div class="pt-3">
                    <button type="submit" class="btn btn-primary">決定</button>
                    <a href="/game" class="btn btn-primary">リセット</a>
                </div>
            </form> 
        </div>
    </div>

    <div class="text-2xl mx-3">    
        <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            積み率：{{ round(($gameStats['backlogNun'] / $gameStats['gameNum']) * 100, 0) }}%
            (総数{{ $gameStats['gameNum'] }}、積み{{ $gameStats['backlogNun'] }}、クリア{{ $gameStats['clearNun'] }})           
        </h3>
    </div>  
    <div class="text-xl mx-3">
        <table class="table table-dark table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">名前</th>
                    <th class="text-center">メーカー</th>
                    <th class="text-center">ハード</th>
                    <th class="text-center">状態</th>
                    <th class="text-center">評価</th>
                    <th class="text-center">備考</th>
                    <th class="text-center">登録日</th>
                    <th class="text-center">編集日</th>
                    <th class="text-center">編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $game)
                <tr>
                    <td class="text-center">{{ $loop->index + 1 }}</td>
                    <td class="text-center">{{ $game->title }}</td>
                    <td class="text-center">{{ $game->maker->name }}</td>
                    <td class="text-center">{{ $game->hard->name }}</td>
                    <td class="text-center">{{ $game->clear }}</td>
                    <td class="text-center">{{ $game->grade }}</td>
                    <td class="text-center">{{ $game->note }}</td>
                    <td class="text-center">{{ date("Y/m/d", strtotime($game->created_at)) }}</td>
                    <td class="text-center">{{ date("Y/m/d", strtotime($game->updated_at)) }}</td>
                    <td class="text-center">
                        <a href="/game/{{ $game->id }}/edit" class="text-gray-300 hover:text-gray-700"><i class="far fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
</x-app-layout>
