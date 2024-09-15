<div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Device Details</h2>

    <div class="space-y-4">
        <!-- Device UUID -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">UUID</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $device->uuid }}</div>
        </div>

        <!-- Device Name -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $device->name }}</div>
        </div>

        <!-- Device Type -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $device->type }}</div>
        </div>

        <!-- Device Description -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $device->description }}</div>
        </div>

        <!-- Secret Key (Hidden or displayed based on requirements) -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Secret Key</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $device->secret_key }}</div>
        </div>

        <!-- Created At -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Created At</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $device->created_at->format('Y-m-d H:i') }}</div>
        </div>

        <!-- Updated At -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Updated At</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $device->updated_at->format('Y-m-d H:i') }}</div>
        </div>
    </div>

</div>
