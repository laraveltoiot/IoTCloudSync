<?php

namespace App\Livewire\CloudVariable;

use App\Models\CloudVariable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class CloudVariableShow extends Component
{
    public $variableId;
    public $variable;

    public function mount($variableId): void
    {
        $this->variableId = $variableId;

        $this->variable = CloudVariable::with('thing')->findOrFail($variableId);
    }
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.cloud-variable.cloud-variable-show');
    }
}
