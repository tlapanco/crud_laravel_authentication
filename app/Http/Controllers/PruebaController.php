<?php

namespace App\Http\Controllers;

use App\Models\Prueba;
use Illuminate\Http\Request;
use App\Http\Requests\Prueba\PruebaRequest;
use App\Http\Requests\Prueba\PruebaEditRequest;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Prueba::orderBy('name', 'asc')->where('name', 'LIKE', "%$request->q%")->paginate( ($request->paginate) ? $request->paginate : 10 );
        return view('prueba.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('prueba.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PruebaRequest $request)
    {
        Prueba::create($request->all());

        return redirect()->route('prueba.index')->with('message', 'Registro creado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Prueba $item){
        return view('prueba.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * PruebaEditRequest es solo usada para en caso de que se requiera saber
     * como validar algun campo unico con sus respectivos
     * puntos a tomar en cuenta
     */
    public function update(PruebaEditRequest $request, Prueba $item)
    {
        $item->update($request->all());

        return redirect()->route('prueba.index')->with('message', 'Registro actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prueba $item)
    {
        $item->forceDelete();
        return redirect()->route('prueba.index')->with('message',"Registro eliminado exitosamente");
    }

    /**
     * Modify the status on a specific resource from storage
     *
     * @param Prueba $item
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus(Request $request, Prueba $item)
    {
        $item->update($request->only('activo'));
        if($item->activo==1){
            return redirect()->route('prueba.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('prueba.index')->with('message', 'Registro desactivado exitosamente');
        }
    }
}
