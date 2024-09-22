<div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 z-50">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6 space-y-4">
        <h2 class="text-lg font-semibold text-gray-800">Create Cloud Variable</h2>

        <!-- Message Alert -->
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

        <!-- Form -->
        <form wire:submit.prevent="submit" class="space-y-4">
            <!-- Name Input -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" wire:model="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
                @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Type Input -->
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <select id="type" wire:model="type" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
                    <option value="">Select Type</option>
                    @foreach($types as $typeOption)
                        <option value="{{ $typeOption }}">{{ ucfirst($typeOption) }}</option>
                    @endforeach
                </select>
                @error('type') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Value Input -->
            <div>
                <label for="value" class="block text-sm font-medium text-gray-700">Value</label>
                <textarea id="value" wire:model="value" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2"></textarea>
                @error('value') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Thing Dropdown -->
            <div>
                <label for="thing_id" class="block text-sm font-medium text-gray-700">Thing</label>
                <select id="thing_id" wire:model="thing_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
                    <option value="">Select Thing</option>
                    @if($things && $things->count() > 0)
                    @foreach($things as $thing)
                        <option value="{{ $thing->id }}">{{ $thing->name }}</option>
                    @endforeach
                    @endif
                </select>
                @error('thing_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-2">
                <button type="button" wire:click="$dispatch('closeCancelModal')" class="px-4 py-2 bg-gray-500 text-white text-sm font-medium rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Create Cloud Variable
                </button>
            </div>
        </form>
    </div>
</div>
