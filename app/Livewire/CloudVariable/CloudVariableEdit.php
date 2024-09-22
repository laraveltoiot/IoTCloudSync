<?php

namespace App\Livewire\CloudVariable;

use App\Models\CloudVariable;
use App\Models\Thing;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CloudVariableEdit extends Component
{
    public $variableId;
    public $name;
    public $type;
    public $value;
    public $thing_id;
    public $things;
    public $showModal = false;

    public $types = ['integer', 'float', 'string', 'boolean'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'type' => 'required|string|in:integer,float,string,boolean',
        'thing_id' => 'required|exists:things,id',
    ];

    public function mount($variableId): void
    {
        // Load the existing CloudVariable based on the variableId passed
        $variable = CloudVariable::findOrFail($variableId);

        // Populate the component properties with the existing values
        $this->variableId = $variableId;
        $this->name = $variable->name;
        $this->type = $variable->type;
        $this->value = $variable->value;
        $this->thing_id = $variable->thing_id;
        $this->things = Thing::all(); // Get all Things
    }

    /**
     * @throws \Exception
     */
    public function submit(): void
    {
        // Initial validation
        $this->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:integer,float,string,boolean',
            'thing_id' => 'required|exists:things,id',
        ]);

        $this->validateValueByType();

        // Find the variable and update its fields
        $variable = CloudVariable::findOrFail($this->variableId);
        $variable->update([
            'name' => $this->name,
            'type' => $this->type,
            'value' => $this->value,
            'thing_id' => $this->thing_id,
        ]);

        session()->flash('message', 'Cloud variable updated successfully.');

        $this->reset();
        $this->dispatch('variableUpdated'); // Dispatch an event to notify the parent component
        $this->showModal = false;
    }

    /**
     * @throws \Exception
     */
    public function validateValueByType(): void
    {
        switch ($this->type) {
            case 'integer':
                $this->validate(['value' => 'required|integer']);
                break;

            case 'float':
                $this->validate(['value' => 'required|numeric']);
                break;

            case 'string':
                $this->validate(['value' => 'required|string']);
                break;

            case 'boolean':
                $this->validate(['value' => 'required|boolean']);
                break;

            default:
                throw new \Exception('Unknown type selected');
        }
    }

    public function openModal(): void
    {
        $this->showModal = true;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
    }

    public function render(): View
    {
        return view('livewire.cloud-variable.cloud-variable-edit', [
            'things' => $this->things,
        ]);
    }
}
