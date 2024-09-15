<?php

namespace App\Livewire\Device;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class DeviceIndex extends Component
{
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.device.device-index');
    }
}
