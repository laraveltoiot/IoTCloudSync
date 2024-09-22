<div class="p-6 bg-white rounded-lg shadow-lg dark:bg-gray-800">
    <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Cloud Variable Details</h2>

    <div class="space-y-4">
        <!-- Variable Name -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $variable->name }}</div>
        </div>

        <!-- Variable Type -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Type</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ ucfirst($variable->type) }}</div>
        </div>

        <!-- Variable Value -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Value</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $variable->value }}</div>
        </div>

        <!-- Associated Thing -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Thing</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $variable->thing->name }}</div>
        </div>

        <!-- Created At -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Created At</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $variable->created_at->format('Y-m-d H:i') }}</div>
        </div>

        <!-- Updated At -->
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Updated At</label>
            <div class="mt-1 text-sm text-gray-900 dark:text-gray-300">{{ $variable->updated_at->format('Y-m-d H:i') }}</div>
        </div>
    </div>
</div>
