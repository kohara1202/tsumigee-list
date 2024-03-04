<section>
    @if($target == 'store')
    <form action="/maker" method="post" class="mt-6 space-y-6">
    @elseif($target == 'update')
    <form action="/maker/{{ $maker->id }}" method="post" class="mt-6 space-y-6">
        <input type="hidden" name="_method" value="PUT">
    @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <x-input-label for="name" :value="'名前'" />
            <x-text-input name="name" type="text" class="mt-1 block w-full" :value="old('name', $maker->name)" required autofocus autocomplete="name" />
        </div>

        <div>
            <x-input-label for="furigana" :value="'フリガナ'" />
            <x-text-input name="furigana" type="text" class="mt-1 block w-full" :value="old('furigana', $maker->furigana)" required autofocus autocomplete="furigana" pattern="^([ァ-ン0-9]|ー)+$"/>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>Save</x-primary-button>
        </div>
    </form>
    @if($target == 'update')
    <form action="/maker/{{ $maker->id }}" method="post" class="mt-3">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <x-danger-button onclick="return confirm('本当によろしいですか？')">Delete</x-danger-button>
    </form>
    @endif
</section>
