<?php

namespace App\Livewire\Device;

use App\Models\Device;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class DeviceEdit extends Component
{
    use InteractsWithBanner;
    public $deviceId;
    public $name;
    public $type;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'description' => 'nullable|string',
    ];

    public function mount($deviceId): void
    {
        $this->deviceId = $deviceId;

        // Fetch the device data
        $device = Device::findOrFail($deviceId);

        // Initialize the form fields with the current device data
        $this->name = $device->name;
        $this->type = $device->type;
        $this->description = $device->description;
    }
    public function updateDevice(): void
    {
        $this->validate();

        // Find the specific device instance and update it
        $device = Device::findOrFail($this->deviceId);

        $device->update([
            'name' => $this->name,
            'type' => $this->type,
            'description' => $this->description,
        ]);

        $this->banner('Device updated successfully');
        $this->dispatch('deviceUpdated'); // Emit event to close modal or refresh the list
    }
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.device.device-edit');
    }
}
