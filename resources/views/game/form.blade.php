<section>
    @if($target == 'store')
    <form action="/game" method="post" class="mt-6 space-y-6">
    @elseif($target == 'update')
    <form action="/game/{{ $game->id }}" method="post" class="mt-6 space-y-6">
        <input type="hidden" name="_method" value="PUT">
    @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <x-input-label for="title" :value="'タイトル'" />
            <x-text-input name="title" type="text" class="mt-1 block w-full" :value="old('title', $game->title)" required autofocus autocomplete="title" />
        </div>

        <div>
            <x-input-label for="furigana" :value="'フリガナ'" />
            <x-text-input name="furigana" type="text" class="mt-1 block w-full" :value="old('furigana', $game->furigana)" required autofocus autocomplete="furigana" pattern="^([ァ-ン0-9]|ー)+$" />
        </div>

        <div>
            <x-input-label for="maker" :value="'メーカー'" />
            <select name="maker" required class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <!-- デフォルトをnullに     -->
                <option value=""></option>
                @foreach ($makers as $maker)
                <option value="{{ $maker->id }}" @if ($maker->id == $game->maker_id) selected @endif>
                    {{ $maker->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <x-input-label for="hard" :value="'ハード'" />
            <select name="hard" required class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <!-- デフォルトをnullに     -->
                <option value=""></option>
                @foreach ($hards as $hard)
                <option value="{{ $hard->id }}" @if ($hard->id == $game->hard_id) selected @endif>
                    {{ $hard->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div>
            <x-input-label for="clear" :value="'クリア？'" />
            <select name="clear" required class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <!-- デフォルトをnullに     -->
                <option value=""></option>
                @foreach (config('const.clears') as $clear)
                    <option value="{{ $clear }}" @if ($clear == $game->clear) selected @endif>
                        {{ $clear }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <x-input-label for="grade" :value="'評価'" />
            <select name="grade" required class="bg-gray-50 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <!-- デフォルトをnullに     -->
                <option value=""></option>
                @foreach (config('const.grades') as $grade)
                    <option value="{{ $grade }}" @if ($grade == $game->grade) selected @endif>
                        {{ $grade }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <x-input-label for="note" :value="'備考'" />
            <x-text-input name="note" type="text" class="mt-1 block w-full" :value="old('note', $game->note)" autofocus autocomplete="furigana" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Save</x-primary-button>
        </div>
    </form>
    @if($target == 'update')
    <form action="/game/{{ $game->id }}" method="post" class="mt-3">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <x-danger-button onclick="return confirm('本当によろしいですか？')">Delete</x-danger-button>
    </form>
    @endif
</section>
