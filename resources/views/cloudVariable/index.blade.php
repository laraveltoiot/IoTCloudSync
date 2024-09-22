<x-app-layout>
    <div class="container mx-auto mt-4">
        @if(isset($message))
            <div class="text-center py-6">
                <p class="text-gray-600 text-lg">{{ $message }}</p>
                <a href="{{ route('things.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Go to Things
                </a>
            </div>
        @elseif(isset($cloudVariables) && isset($thing))
            <h2 class="text-2xl font-semibold mb-4">Cloud Variables for {{ $thing->name }}</h2>
            <!-- Display the list of Cloud Variables -->
            @livewire('cloud-variable.cloud-variable-index', ['thingId' => $thing->id])
        @else
            <div class="text-center py-6">
                <p class="text-gray-600 text-lg">No Cloud Variables defined.</p>
                <a href="{{ route('things.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Go to Things
                </a>
            </div>
        @endif
    </div>
</x-app-layout>
