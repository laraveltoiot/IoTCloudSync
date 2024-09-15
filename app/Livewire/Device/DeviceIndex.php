<?php

namespace App\Livewire\Device;

use App\Models\Device;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class DeviceIndex extends Component
{
    use InteractsWithBanner;
    public $search = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $editDeviceId;
    public $deleteDeviceId;

    protected $listeners = [
        'deviceCreated' => 'closeCreateModal',
        'deviceUpdated' => 'closeEditModal',
        'closeModal' => 'closeEditModal'
    ];

    public function openCreateModal(): void
    {
        $this->showCreateModal = true;
    }

    public function closeCreateModal(): void
    {
        $this->showCreateModal = false;
    }

    public function openEditModal($deviceId): void
    {
        $this->editDeviceId = $deviceId;
        $this->showEditModal = true;
    }

    public function closeEditModal(): void
    {
        $this->showEditModal = false;
    }
    public function openDeleteModal($deviceId): void
    {
        $this->deleteDeviceId = $deviceId;
        $this->showDeleteModal = true;
    }
    public function closeDeleteModal(): void
    {
        $this->showDeleteModal = false;
    }
    public function deleteDevice(): void
    {
        $device = Device::findOrFail($this->deleteDeviceId);

        // TODO: Check if the device has relationships that need to be handled before deleting
        $device->delete();

        $this->banner('Device deleted successfully');
        $this->closeDeleteModal();
        $this->dispatch('deviceDeleted'); // Emit event to refresh the list if needed
    }

    public function highlightSearch($text): array|string|null
    {
        if ($this->search === '') {
            return $text;
        }

        // Escape special characters for regular expression
        $escapedSearch = preg_quote($this->search, '/');

        // Replace matched text with highlighted HTML
        return preg_replace('/(' . $escapedSearch . ')/i', '<span class="text-red-600">$1</span>', $text);
    }


    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        $devices = Device::where('user_id', auth()->id())
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('type', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.device.device-index', compact('devices'));
    }
}
