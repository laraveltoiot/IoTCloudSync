<div class="dark:bg-gray-900 py-5">
    <div class="flex justify-between items-center mb-2">
        <h2 class="font-semibold leading-7 dark:text-white mb-5 text-xl">Devices</h2>
        <a href="{{ route('devices.create') }}" class="px-4 py-2 bg-blue-500 border border-transparent rounded-md
            font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 focus:bg-blue-700 active:bg-blue-900
            focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
            Create Device
        </a>
    </div>
    <div class="mb-6 flex items-center">
        <input type="text" wire:model="search" placeholder="Search..." class="flex-1 p-2 border border-gray-600 rounded">
    </div>

    <table class="mt-6 w-full whitespace-nowrap text-left">
        <colgroup>
            <col class="w-full sm:w-4/12">
            <col class="lg:w-3/12">
            <col class="lg:w-2/12">
            <col class="lg:w-1/12">
            <col class="lg:w-1/12">
        </colgroup>
        <thead class="border-b dark:border-white/10 text-sm leading-6 dark:text-white">
        <tr>
            <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">Name</th>
            <th scope="col" class="py-2 pl-0 pr-8 font-semibold">Type</th>
            <th scope="col" class="py-2 pl-0 pr-8 font-semibold">Description</th>
            <th scope="col" class="py-2 pl-0 pr-4 font-semibold text-center">Online</th>
            <th scope="col" class="py-2 pl-0 pr-4 text-right font-semibold">Actions</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
        @forelse($devices as $device)
            <tr>
                <td class="py-4 pl-4 pr-8 sm:pl-6 lg:pl-8">
                    <div class="flex items-center gap-x-4">
                        <div class="truncate text-sm font-medium leading-6 text-white">{{ $device->name }}</div>
                    </div>
                </td>
                <td class="py-4 pl-0 pr-8 text-sm leading-6 text-white">{{ $device->type }}</td>
                <td class="py-4 pl-0 pr-8 text-sm leading-6 text-gray-400">{{ $device->description }}</td>
                <td class="py-4 pl-0 pr-4 text-sm leading-6 text-center">
                    @if($device->is_online)
                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full">Online</span>
                    @else
                        <span class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded-full">Offline</span>
                    @endif
                </td>
                <td class="py-4 pl-0 pr-4 text-right text-sm leading-6">
                    <a href="{{ route('devices.edit', $device) }}" class="text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="py-4 pl-4 pr-8 sm:pl-6 lg:pl-8 text-center text-sm text-gray-400">No devices found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
