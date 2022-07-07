<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Persona;

class PersonasIndex extends Component
{
    use  WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search="";

    public function updatingSearch(){

        $this->resetPage();

    }

    public function render()
    {
        $personas = Persona::where('nombre', 'LIKE','%'. $this->search . '%')
        ->orwhere('apellido', 'LIKE','%'. $this->search . '%')
        ->orwhere('documento', 'LIKE','%'. $this->search . '%')
        ->latest('id')
        ->paginate(10);

        return view('livewire.personas-index', compact('personas'));
    }

}
