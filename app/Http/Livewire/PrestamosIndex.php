<?php

namespace App\Http\Livewire;

use App\Models\Prestamo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;

class PrestamosIndex extends Component
{
    use  WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search="";

    public function updatingSearch(){

        $this->resetPage();

    }

    public function render()
    {

        $prestamos = DB::table('prestamos AS a')
        ->join('personas AS b', function ($join) {
            $join->on('b.id', '=', 'a.persona_id');
        })
        ->join('productos AS c', function ($join) {
            $join->on('c.id', '=', 'a.producto_id');
        })
        ->select('a.*', 'b.documento', 'b.nombre', 'b.apellido', 'c.alias')
        ->where('a.Estado', '=', 'A')
        ->where('a.numero_expediente', 'LIKE', '%'. $this->search . '%')
        ->orWhere('b.documento', 'LIKE', '%'. $this->search .'%')
        ->orWhere('b.nombre', 'LIKE', '%'. $this->search .'%')
        ->orWhere('b.apellido', 'LIKE', '%'. $this->search .'%')
        ->latest('id')
        ->paginate(10);

        return view('livewire.prestamos-index', compact('prestamos'));
    }
}
