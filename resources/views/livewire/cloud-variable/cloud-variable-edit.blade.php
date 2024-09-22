<div>
    <form wire:submit.prevent="submit">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" wire:model="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

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

        <div>
            <label for="value" class="block text-sm font-medium text-gray-700">Value</label>
            <input type="text" id="value" wire:model="value" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
            @error('value') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="thing_id" class="block text-sm font-medium text-gray-700">Thing</label>
            <select id="thing_id" wire:model="thing_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-2">
                <option value="">Select Thing</option>
                @if($things && $things->count() > 0)
                    @foreach($things as $thing)
                        <option value="{{ $thing->id }}">{{ $thing->name }}</option>
                    @endforeach
                @else
                    <option value="" disabled>No things available</option>
                @endif
            </select>
            @error('thing_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex justify-end mt-4">
            <button wire:click="$dispatch('closeCancelEditModal')" type="button" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">Cancel</button>
            <button type="submit" class="ml-4 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save Changes</button>
        </div>
    </form>
</div>
