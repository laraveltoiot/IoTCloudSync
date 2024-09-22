<?php

namespace App\Livewire\Things;

use App\Models\Thing;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class ThingCreate extends Component
{
    use InteractsWithBanner;

    public $name;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ];

    public function createThing(): void
    {
        $this->validate();

        Thing::create([
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => auth()->id(),
        ]);

        $this->banner('Thing created successfully');
        $this->reset();
        $this->dispatch('thingCreated');
    }
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.things.thing-create');
    }
}
