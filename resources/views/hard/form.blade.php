<section>
    @if($target == 'store')
    <form action="/hard" method="post" class="mt-6 space-y-6">
    @elseif($target == 'update')
    <form action="/hard/{{ $hard->id }}" method="post" class="mt-6 space-y-6">
        <input type="hidden" name="_method" value="PUT">
    @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div>
            <x-input-label for="name" :value="'名前'" />
            <x-text-input name="name" type="text" class="mt-1 block w-full" :value="old('name', $hard->name)" required autofocus autocomplete="name" pattern="^([a-zA-Z0-9]|-)+$"/>
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>Save</x-primary-button>
        </div>
    </form>
    @if($target == 'update')
    <form action="/hard/{{ $hard->id }}" method="post" class="mt-3">
        <input type="hidden" name="_method" value="DELETE">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <x-danger-button onclick="return confirm('本当によろしいですか？')">Delete</x-danger-button>
    </form>
    @endif
</section>
