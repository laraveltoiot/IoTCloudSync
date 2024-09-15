<?php

namespace App\Livewire\Device;

use App\Models\Device;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class DeviceShow extends Component
{
    public $deviceId;
    public $device;

    public function mount($deviceId): void
    {
        $this->deviceId = $deviceId;

        // Fetch the device data
        $this->device = Device::findOrFail($deviceId);
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.device.device-show');
    }
}
