<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\estudiantes;
use App\Models\Carreras;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = estudiantes::select('estudiantes.ide','estudiantes.nombre', 'estudiantes.matricula','estudiantes.activo','carreras.nombre as carre')
                ->join('carreras', 'carreras.idca', '=', 'estudiantes.idca')
                ->where('estudiantes.nombre', 'LIKE', "%$request->q%")
                ->paginate( ($request->paginate) ? $request->paginate : 10 );




        /*$items = estudiantes::orderBy('nombre', 'asc')->where('nombre', 'LIKE', "%$request->q%")
                ->paginate( ($request->paginate) ? $request->paginate : 10 );*/
        return view('estudiantes.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras=Carreras::all();
        return view('estudiantes.create')
                ->with('Carreras', $carreras);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //return $request;
      $this->validate($request,[
        'matricula'=>'required|regex:/^[0-9]{10}$/',
        'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
        'idca'=>'required',
        'sexo'=>'required',
        'activo'=>'required',
      ]);

           $estudiantes = new estudiantes;
           $estudiantes->matricula = $request->matricula;
           $estudiantes->nombre = $request->nombre;
           $estudiantes->sexo = $request->sexo;
           $estudiantes->idca= $request->idca;
           $estudiantes->activo = $request->activo;
           $estudiantes->save();

           //echo "REGISTRO GUARDADO";

           return redirect()->route('estudiantes.index')->with('message', 'Estudiante creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(estudiantes $estudiantes)
    {
        $consulta = estudiantes::select('estudiantes.ide','estudiantes.nombre', 'estudiantes.matricula','estudiantes.sexo','estudiantes.activo','carreras.nombre as carre')
              ->join('carreras', 'carreras.idca', '=', 'estudiantes.idca')
              ->where('estudiantes.ide', '=', $estudiantes->ide)->get();
        $carreras=Carreras::all();
        //return $consulta[0];
        return view('estudiantes.edit')
            ->with('consulta',$consulta[0])
            ->with('carreras',$carreras);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estudiantes $estudiantes)
    {
        //return $estudiantes;
        $this->validate($request,[
          'matricula'=>'required|regex:/^[0-9]{10}$/',
          'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
          'idca'=>'required',
          'sexo'=>'required',
          'activo'=>'required',
        ]);

        $estudiantes = estudiantes::find($estudiantes->ide);
        $estudiantes->matricula = $request->matricula;
        $estudiantes->nombre = $request->nombre;
        $estudiantes->sexo = $request->sexo;
        $estudiantes->idca= $request->idca;
        $estudiantes->activo = $request->activo;
        $estudiantes->save();

        return redirect()->route('estudiantes.index')->with('message', 'Estudiante modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(estudiantes $item)
    {
        $item->forceDelete();
        return redirect()->route('estudiantes.index')->with('message',"Registro eliminado exitosamente");
    }

    public function toggleStatus(Request $request, estudiantes $item)
    {
        $item->update($request->only('activo'));
        if($item->activo==1){
            return redirect()->route('estudiantes.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('estudiantes.index')->with('message', 'Registro desactivado exitosamente');
        }
    }




    
}
