<?php

namespace App\Livewire\Device;

use App\Models\Device;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class DeviceIndex extends Component
{
    public $search = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $editDeviceId;

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
