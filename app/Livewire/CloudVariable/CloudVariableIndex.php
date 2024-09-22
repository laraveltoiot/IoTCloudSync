<?php

namespace App\Livewire\CloudVariable;

use App\Models\CloudVariable;
use App\Models\Thing;
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
        'closeCancelModal' => 'closeCreateModal',
        'closeCancelEditModal' => 'closeEditModal',
    ];
    public function mount($thingId = null): void
    {
        $this->thingId = $thingId;

        if ($thingId) {
            $this->thing = Thing::find($thingId);
        }
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
    public function render()
    {
        if ($this->thingId) {
            // Fetch variables for the specific Thing
            $variables = CloudVariable::where('thing_id', $this->thingId)
                ->where(function($query) {
                    $query->where('name', 'like', '%'.$this->search.'%')
                        ->orWhere('type', 'like', '%'.$this->search.'%')
                        ->orWhere('value', 'like', '%'.$this->search.'%');
                })
                ->get();
        } else {
            // Fetch variables for all Things associated with the user
            $user = auth()->user();
            $things = $user->things;

            if ($things->isEmpty()) {
                $variables = collect(); // Empty collection
            } else {
                $variables = CloudVariable::whereIn('thing_id', $things->pluck('id'))
                    ->where(function($query) {
                        $query->where('name', 'like', '%'.$this->search.'%')
                            ->orWhere('type', 'like', '%'.$this->search.'%')
                            ->orWhere('value', 'like', '%'.$this->search.'%');
                    })
                    ->get();
            }
        }

        return view('livewire.cloud-variable.cloud-variable-index', [
            'variables' => $variables,
        ]);
    }

}
