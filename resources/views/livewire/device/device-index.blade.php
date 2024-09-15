<div class="dark:bg-gray-900 py-10">
    <h2 class="px-4 text-base font-semibold leading-7 dark:text-white sm:px-6 lg:px-8">Devices</h2>

    <div class="px-4 sm:px-6 lg:px-8 mb-6">
        <input type="text" wire:model="search" placeholder="Search..." class="w-full p-2 border border-gray-600 rounded">
    </div>

    <table class="mt-6 w-full whitespace-nowrap text-left">
        <colgroup>
            <col class="w-full sm:w-4/12">
            <col class="lg:w-4/12">
            <col class="lg:w-2/12">
            <col class="lg:w-1/12">
            <col class="lg:w-1/12">
        </colgroup>
        <thead class="border-b dark:border-white/10 text-sm leading-6 dark:text-white">
        <tr>
            <th scope="col" class="py-2 pl-4 pr-8 font-semibold sm:pl-6 lg:pl-8">Name</th>
            <th scope="col" class="py-2 pl-0 pr-8 font-semibold">Type</th>
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
                <td class="py-4 pl-0 pr-4 text-sm leading-6 text-gray-400">{{ $device->description }}</td>
                <td class="py-4 pl-0 pr-4 text-right text-sm leading-6">
                    <a href="{{ route('devices.edit', $device) }}" class="text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="py-4 pl-4 pr-8 sm:pl-6 lg:pl-8 text-center text-sm text-gray-400">No devices found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
