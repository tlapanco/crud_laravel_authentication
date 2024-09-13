<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estudiantes;
use App\Models\Carreras;
use App\Models\asesores_academicos;

class AcademicosController extends Controller
{
    public function index(Request $request)
    {
       $items = asesores_academicos::orderBy('nombre', 'asc')->where('nombre', 'LIKE', "%$request->q%")
                ->paginate( ($request->paginate) ? $request->paginate : 10 );

        return view('asesores_academicos.index', compact('items'));
    }

}
