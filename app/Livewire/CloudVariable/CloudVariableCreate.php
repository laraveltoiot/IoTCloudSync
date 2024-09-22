<?php

namespace App\Livewire\CloudVariable;

use App\Models\CloudVariable;
use App\Models\Thing;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CloudVariableCreate extends Component
{
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

    public function mount(): void
    {
        $this->things = Thing::all();
    }

    /**
     * @throws \Exception
     */
    public function submit(): void
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:integer,float,string,boolean',
            'thing_id' => 'required|exists:things,id',
        ]);

        $this->validateValueByType();

        CloudVariable::create([
            'name' => $this->name,
            'type' => $this->type,
            'value' => $this->value,
            'thing_id' => $this->thing_id,
        ]);

        session()->flash('message', 'Cloud variable created successfully.');

        $this->reset();
        $this->dispatch('variableCreated');
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
        return view('livewire.cloud-variable.cloud-variable-create', [
            'things' => $this->things,
        ]);
    }
}
