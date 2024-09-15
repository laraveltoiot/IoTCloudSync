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
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        $devices = Device::where('user_id', auth()->id())
            ->where(function($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('type', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.device.device-index', compact('devices'));
    }
}
