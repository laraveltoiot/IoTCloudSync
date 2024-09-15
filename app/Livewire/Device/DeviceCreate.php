<?php

namespace App\Livewire\Device;

use App\Models\Device;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Str;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class DeviceCreate extends Component
{
    use InteractsWithBanner;
    public $name;
    public $type;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'description' => 'nullable|string',
    ];

    public function createDevice(): void
    {
        $this->validate();

        Device::create([
            'uuid' => (string) Str::uuid(),
            'name' => $this->name,
            'type' => $this->type,
            'description' => $this->description,
            'secret_key' => Str::random(32),
            'user_id' => auth()->id(),
        ]);

       $this->banner('Device created successfully');
        $this->reset(); // Reset fields after creating
        $this->dispatch('deviceCreated'); // Emit event to close modal
    }
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.device.device-create');
    }
}
