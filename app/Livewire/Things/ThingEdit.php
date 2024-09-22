<?php

namespace App\Livewire\Things;

use App\Models\Thing;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class ThingEdit extends Component
{
    use InteractsWithBanner;

    public $thingId;
    public $name;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ];

    public function mount($thingId): void
    {
        $this->thingId = $thingId;

        $thing = Thing::findOrFail($thingId);

        $this->name = $thing->name;
        $this->description = $thing->description;
    }

    public function updateThing(): void
    {
        $this->validate();

        $thing = Thing::findOrFail($this->thingId);

        $thing->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->banner('Thing updated successfully');
        $this->dispatch('thingUpdated');
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.things.thing-edit');
    }
}
