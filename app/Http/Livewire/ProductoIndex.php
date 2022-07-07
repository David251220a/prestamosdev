<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class ProductoIndex extends Component
{

    use  WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search="";

    public function updatingSearch(){

        $this->resetPage();

    }

    public function render()
    {
        $productos = Producto::latest('id')
        ->paginate(10);
        return view('livewire.producto-index', compact('productos'));
    }
}
