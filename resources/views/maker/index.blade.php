<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between items-center">
            <span>メーカー</span>
            <a href="/maker/create"><x-primary-button>New</x-primary-button></a>
        </h2>
    </x-slot>
    
    <div class="text-xl text-gray-900 dark:text-gray-100">
        <table class="table-auto mx-auto">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">名前</th>
                    <th class="text-center">編集</th>
                </tr>
            </thead>
            <tbody>
                @foreach($makers as $maker)
                <tr>
                    <td align="center">{{ $loop->index + 1 }}</td>
                    <td>{{ $maker->name }}</td>
                    <td align="center">
                        <a href="/maker/{{ $maker->id }}/edit" class="text-gray-300 hover:text-gray-700"><i class="far fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach 
            </tbody>
        </table>
    </div>
    
</x-app-layout>
