<?php

namespace App\Livewire\Things;

use App\Models\Thing;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class ThingIndex extends Component
{
    use InteractsWithBanner;

    public $search = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $editThingId;
    public $deleteThingId;

    protected $listeners = [
        'thingCreated' => 'closeCreateModal',
        'thingUpdated' => 'closeEditModal',
        'closeModal' => 'closeCreateModal',
    ];

    public function openCreateModal(): void
    {
        $this->showCreateModal = true;
    }

    public function closeCreateModal(): void
    {
        $this->showCreateModal = false;
    }

    public function openEditModal($thingId): void
    {
        $this->editThingId = $thingId;
        $this->showEditModal = true;
    }

    public function closeEditModal(): void
    {
        $this->showEditModal = false;
    }

    public function openDeleteModal($thingId): void
    {
        $this->deleteThingId = $thingId;
        $this->showDeleteModal = true;
    }

    public function closeDeleteModal(): void
    {
        $this->showDeleteModal = false;
    }

    public function deleteThing(): void
    {
        $thing = Thing::findOrFail($this->deleteThingId);

        $thing->delete();

        $this->banner('Thing deleted successfully');
        $this->closeDeleteModal();
        $this->dispatch('thingDeleted');
    }

    public function highlightSearch($text): array|string|null
    {
        if ($this->search === '') {
            return $text;
        }

        // Escape special characters for regular expression
        $escapedSearch = preg_quote($this->search, '/');

        // Replace matched text with highlighted HTML
        return preg_replace('/(' . $escapedSearch . ')/i', '<span class="text-red-600">$1</span>', $text);
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        $things = Thing::where('user_id', auth()->id())
            ->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.things.thing-index', compact('things'));
    }
}
