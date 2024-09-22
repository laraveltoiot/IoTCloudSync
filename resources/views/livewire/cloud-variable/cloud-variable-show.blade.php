<div class="container mx-auto p-4">
    <h1 class="text-xl font-bold mb-4">Cloud Variable Details</h1>

    <div class="bg-white p-4 rounded-lg shadow-md">
        <p><strong>Name:</strong> {{ $cloudVariable->name }}</p>
        <p><strong>Type:</strong> {{ $cloudVariable->type }}</p>
        <p><strong>Value:</strong> {{ $cloudVariable->value }}</p>
        <p><strong>Thing:</strong> {{ $cloudVariable->thing->name }}</p>
    </div>

    <div class="mt-4">
        <a href="{{ route('cv.index') }}" class="text-blue-500 hover:underline">Back to list</a>
    </div>
</div>
