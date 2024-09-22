<?php

namespace App\Livewire\CloudVariable;

use App\Models\CloudVariable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Component;

class CloudVariableIndex extends Component
{
    use InteractsWithBanner;

    public $thingId;
    public $thing;
    public $search = '';
    public $showCreateModal = false;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $editVariableId;
    public $deleteVariableId;

    protected $listeners = [
        'variableCreated' => 'closeCreateModal',
        'variableUpdated' => 'closeEditModal',
        'closeModal' => 'closeEditModal',
    ];
    public function mount($thingId): void
    {
        $this->thingId = $thingId;
        $this->thing = Thing::findOrFail($thingId);
    }

    public function openCreateModal(): void
    {
        $this->showCreateModal = true;
    }

    public function closeCreateModal(): void
    {
        $this->showCreateModal = false;
    }

    public function openEditModal($variableId): void
    {
        $this->editVariableId = $variableId;
        $this->showEditModal = true;
    }

    public function closeEditModal(): void
    {
        $this->showEditModal = false;
    }

    public function openDeleteModal($variableId): void
    {
        $this->deleteVariableId = $variableId;
        $this->showDeleteModal = true;
    }

    public function closeDeleteModal(): void
    {
        $this->showDeleteModal = false;
    }

    public function deleteVariable(): void
    {
        $variable = CloudVariable::findOrFail($this->deleteVariableId);

        $variable->delete();

        $this->banner('Variable deleted successfully');
        $this->closeDeleteModal();
        $this->dispatch('variableDeleted');
    }

    public function highlightSearch($text): array|string|null
    {
        if ($this->search === '') {
            return $text;
        }

        $escapedSearch = preg_quote($this->search, '/');

        return preg_replace('/(' . $escapedSearch . ')/i', '<span class="text-red-600">$1</span>', $text);
    }
    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.cloud-variable.cloud-variable-index');
    }
}
