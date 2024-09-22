<?php

namespace App\Livewire\CloudVariable;

use App\Models\CloudVariable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class CloudVariableEdit extends Component
{
    use InteractsWithBanner;

    public $variableId;
    public $name;
    public $type;
    public $value;

    protected $rules = [
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'value' => 'nullable|string',
    ];

    public function mount($variableId): void
    {
        $this->variableId = $variableId;

        $variable = CloudVariable::findOrFail($variableId);

        $this->name = $variable->name;
        $this->type = $variable->type;
        $this->value = $variable->value;
    }

    public function updateVariable(): void
    {
        $this->validate();

        $variable = CloudVariable::findOrFail($this->variableId);

        $variable->update([
            'name' => $this->name,
            'type' => $this->type,
            'value' => $this->value,
        ]);

        $this->banner('Variable updated successfully');
        $this->dispatch('variableUpdated');
    }
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.cloud-variable.cloud-variable-edit');
    }
}
