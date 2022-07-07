<?php

namespace App\Http\Livewire;

use App\Models\Tasa;
use Livewire\Component;
use Livewire\WithPagination;

class TasasIndex extends Component
{
    use  WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search="";

    public function updatingSearch(){

        $this->resetPage();

    }

    public function render()
    {
        $tasas = Tasa::latest('id')
        ->paginate(10);
        return view('livewire.tasas-index', compact('tasas'));
    }
}
