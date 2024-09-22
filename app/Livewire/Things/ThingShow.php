<?php

namespace App\Livewire\Things;

use App\Models\Thing;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class ThingShow extends Component
{
    public $thingId;
    public $thing;

    public function mount($thingId): void
    {
        $this->thingId = $thingId;

        $this->thing = Thing::findOrFail($thingId);
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.things.thing-show');
    }
}
