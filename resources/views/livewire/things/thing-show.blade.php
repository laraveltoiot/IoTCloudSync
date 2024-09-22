<div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Thing Details</h2>

    <div class="space-y-4">
        <!-- Thing Name -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $thing->name }}</div>
        </div>

        <!-- Thing Description -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $thing->description }}</div>
        </div>

        <!-- User (Owner) -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Owner</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $thing->user->name }}</div>
        </div>

        <!-- Created At -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Created At</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $thing->created_at->format('Y-m-d H:i') }}</div>
        </div>

        <!-- Updated At -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Updated At</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $thing->updated_at->format('Y-m-d H:i') }}</div>
        </div>

        <!-- Associated Devices -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Devices</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">
                @if($thing->devices->count())
                    <ul class="list-disc list-inside">
                        @foreach($thing->devices as $device)
                            <li>{{ $device->name }} ({{ $device->type }})</li>
                        @endforeach
                    </ul>
                @else
                    <p>No devices associated.</p>
                @endif
            </div>
        </div>

        <!-- Associated Variables -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Variables</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">
                @if($thing->variables->count())
                    <ul class="list-disc list-inside">
                        @foreach($thing->variables as $variable)
                            <li>{{ $variable->name }}: {{ $variable->value }} ({{ $variable->type }})</li>
                        @endforeach
                    </ul>
                @else
                    <p>No variables defined.</p>
                @endif
            </div>
        </div>
    </div>
</div>
