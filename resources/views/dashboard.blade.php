<x-app-layout>
    <x-slot name="header">
<div class="flex items-center justify-between">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   <h1 class="text-2xl font-bold mb-4">Singers & Songs</h1>

@foreach ($singers as $singer)
    <div class="border p-4 mb-4 rounded bg-white dark:bg-[#1D1D1B] text-black dark:text-white">
        <h2 class="text-xl font-semibold text-[#ffb6c1] dark:text-[#ffb6c1]">
            {{ $singer->singer }}
        </h2>
        <p>Gender: {{ $singer->gender }}</p>
        <p>Awards: {{ $singer->award }}</p>
        <p>Country: {{ $singer->country }}</p>

        <h3 class="mt-2 font-medium">Songs:</h3>
        @if ($singer->songs->isEmpty())
            <p class="pl-5 text-gray-500">N/A</p>
        @else
            <ul class="list-disc pl-5">
                @foreach ($singer->songs as $song)
                    <li>
                        {{ $song->song }} ({{ $song->genre }}) - Spotify: {{ $song->spotify }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
