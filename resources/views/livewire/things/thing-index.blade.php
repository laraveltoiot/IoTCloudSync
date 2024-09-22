<div class="dark:bg-gray-900 py-5">
    <div class="flex justify-between items-center mb-2">
        <h2 class="font-semibold leading-7 dark:text-white mb-5 text-xl">Things</h2>
        <button wire:click="openCreateModal" class="px-4 py-2 bg-blue-500 border border-transparent rounded-md
            font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:bg-blue-700 active:bg-blue-900
            focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Create Thing
        </button>
    </div>

    <!-- Modal for Create Thing -->
    @if($showCreateModal)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative">
                <button wire:click="closeCreateModal" class="text-gray-400 hover:text-gray-600 absolute top-2 right-2">&times;</button>
                @livewire('things.thing-create')
            </div>
        </div>
    @endif

    <!-- Modal for Delete Thing Confirmation -->
    @if($showDeleteModal)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative">
                <button wire:click="closeDeleteModal" class="text-gray-400 hover:text-gray-600 absolute top-2 right-2">&times;</button>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Confirm Delete</h3>
                <p class="text-sm text-gray-500 mb-4">Are you sure you want to delete this thing? This action cannot be undone.</p>
                <div class="flex justify-end">
                    <button wire:click="closeDeleteModal" class="mr-4 px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">Cancel</button>
                    <button wire:click="deleteThing" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Delete</button>
                </div>
            </div>
        </div>
    @endif

    <!-- Modal for Edit Thing -->
    @if($showEditModal)
        <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative">
                <button wire:click="closeEditModal" class="text-gray-400 hover:text-gray-600 absolute top-2 right-2">&times;</button>
                @livewire('things.thing-edit', ['thingId' => $editThingId])
            </div>
        </div>
    @endif

    <div class="mb-6 flex items-center">
        <input type="text" wire:model.live="search" placeholder="Search..." class="flex-1 p-2 border border-gray-600 rounded">
    </div>

    <table class="mt-6 w-full whitespace-nowrap text-left">
        <colgroup>
            <col class="w-full sm:w-6/12">
            <col class="lg:w-4/12">
            <col class="lg:w-2/12">
        </colgroup>
        <thead class="border-b dark:border-white/10 text-sm leading-6 dark:text-white">
        <tr>
            <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">Name</th>
            <th scope="col" class="py-2 pl-0 pr-8 font-semibold">Description</th>
            <th scope="col" class="py-2 pl-0 pr-4 text-right font-semibold">Actions</th>
        </tr>
        </thead>
        <tbody class="divide-y dark:divide-white/5">
        @forelse($things as $thing)
            <tr>
                <td class="py-4 pl-4 pr-8 sm:pl-6 lg:pl-8">
                    <div class="flex items-center gap-x-4">
                        <div class="truncate text-sm font-medium leading-6 dark:text-white">{!! $this->highlightSearch($thing->name) !!}</div>
                    </div>
                </td>
                <td class="py-4 pl-0 pr-8 text-sm leading-6 dark:text-white">{!! $this->highlightSearch($thing->description) !!}</td>
                <td class="py-4 pl-0 pr-4 text-right text-sm leading-6">
                    <a href="{{ route('things.show', $thing->id) }}" class="text-blue-500 hover:underline mr-2">Show</a>
                    <a href="javascript:void(0)" wire:click="openEditModal({{ $thing->id }})" class="text-blue-500 hover:underline mr-2">Edit</a>
                    <a href="javascript:void(0)" wire:click="openDeleteModal({{ $thing->id }})" class="text-red-500 hover:underline">Delete</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="py-4 pl-4 pr-8 sm:pl-6 lg:pl-8 text-center text-sm text-gray-400">No things found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
