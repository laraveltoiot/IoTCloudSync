<?php

namespace App\Livewire\CloudVariable;

use App\Models\CloudVariable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class CloudVariableShow extends Component
{
    public $cloudVariableId;
    public $cloudVariable;

    public function mount($cloudVariableId): void
    {
        $this->cloudVariable = CloudVariable::with('thing')->findOrFail($cloudVariableId);
    }
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.cloud-variable.cloud-variable-show', [
            'cloudVariable' => $this->cloudVariable,
        ]);
    }
}
