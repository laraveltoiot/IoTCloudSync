<x-app-layout>
    <div class="container mx-auto mt-4">
        <h2 class="text-2xl font-semibold mb-4">Select a Thing</h2>
        <ul>
            @foreach($things as $thing)
                <li class="mb-2">
                    <a href="{{ route('cv.index', ['thingId' => $thing->id]) }}"
                       class="text-blue-500 hover:underline">
                        {{ $thing->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
