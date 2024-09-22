<?php

namespace App\Livewire\CloudVariable;

use App\Models\CloudVariable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class CloudVariableCreate extends Component
{
    use InteractsWithBanner;

    public $thingId;
    public $name;
    public $type;
    public $value;

    protected $rules = [
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'value' => 'nullable|string',
    ];


    public function createVariable(): void
    {
        $this->validate();

        CloudVariable::create([
            'name' => $this->name,
            'type' => $this->type,
            'value' => $this->value,
            'thing_id' => $this->thingId,
        ]);

        $this->banner('Variable created successfully');
        $this->reset(['name', 'type', 'value']);
        $this->dispatch('variableCreated');
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.cloud-variable.cloud-variable-create');
    }
}
