<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\asesores_industriales;
use App\Models\empresas;

class asesores_industrialesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $items = asesores_industriales::select( 'asesores_industriales.idai','asesores_industriales.rfc','asesores_industriales.titulacion', 'asesores_industriales.nombre',
        'asesores_industriales.apellido_paterno','asesores_industriales.apellido_materno','asesores_industriales.cargo','asesores_industriales.telefono', 'asesores_industriales.correo', 'asesores_industriales.activo','empresas.nombre as empre')
 
        ->join('empresas', 'empresas.idem', '=', 'asesores_industriales.idem')
        ->where('asesores_industriales.nombre', 'LIKE', "%$request->q%")
        ->paginate( ($request->paginate) ? $request->paginate : 10 );
 
        
return view('asesores_industriales.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas = empresas::all();
        return view('asesores_industriales.create')
        ->with('empresas',$empresas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            //Signode + significa que la cadena se repite una o muchas veces
            'rfc'=>'regex:/^[A-Z]{4}[0-9]{6}[A-Z,0-9]{3}$/',
            'titulacion'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'apellido_paterno'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'apellido_materno'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'cargo'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'telefono' => 'required|regex:/^[0-9]{10}$/',      
            'correo'=>'required|email',
            'activo'=>'required',  
            'idem'=>'required',
        ]);

        $asesores_industriales = new asesores_industriales;
        $asesores_industriales->rfc = $request->rfc;
        $asesores_industriales->titulacion = $request->titulacion;
        $asesores_industriales->nombre = $request->nombre;
        $asesores_industriales->apellido_paterno = $request->apellido_paterno;
        $asesores_industriales->apellido_materno = $request->apellido_materno;
        $asesores_industriales->cargo = $request->cargo;
        $asesores_industriales->telefono = $request->telefono;
        $asesores_industriales->correo = $request->correo;
        $asesores_industriales->activo = $request->activo;
        $asesores_industriales->idem = $request->idem;
        $asesores_industriales->save();
        
        return redirect()->route('asesores_industriales.index')->with('message', 'Asesor industrial creado exitosamente');
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
    public function edit(asesores_industriales $asesores_industriales)
    {
        

        $consulta = asesores_industriales::select( 'asesores_industriales.idai','asesores_industriales.rfc','asesores_industriales.titulacion', 'asesores_industriales.nombre',
        'asesores_industriales.apellido_paterno','asesores_industriales.apellido_materno','asesores_industriales.cargo','asesores_industriales.telefono', 'asesores_industriales.correo', 'empresas.nombre as empre','empresas.idem','asesores_industriales.activo')
 
        ->join('empresas', 'empresas.idem', '=', 'asesores_industriales.idem')
        ->where('asesores_industriales.idai', '=', $asesores_industriales->idai)->get();
        $empresas = empresas::all();

        return view('asesores_industriales.edit')
        ->with('consulta', $consulta[0])
        ->with('empresas', $empresas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asesores_industriales $asesores_industriales)
    {
        $this->validate($request,[
            //Signode + significa que la cadena se repite una o muchas veces
            'rfc'=>'regex:/^[A-Z]{4}[0-9]{6}[A-Z,0-9]{3}$/',
            'titulacion'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'apellido_paterno'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'apellido_materno'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'cargo'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
            'telefono' => 'required|regex:/^[0-9]{10}$/',      
            'correo'=>'required|email',
            'activo'=>'required',  
            'idem'=>'required',
        ]);

        $asesores_industriales = asesores_industriales::find($asesores_industriales->idai);
        $asesores_industriales->rfc = $request->rfc;
        $asesores_industriales->titulacion = $request->titulacion;
        $asesores_industriales->nombre = $request->nombre;
        $asesores_industriales->apellido_paterno = $request->apellido_paterno;
        $asesores_industriales->apellido_materno = $request->apellido_materno;
        $asesores_industriales->cargo = $request->cargo;
        $asesores_industriales->telefono = $request->telefono;
        $asesores_industriales->correo = $request->correo;
        $asesores_industriales->idem = $request->idem;
        $asesores_industriales->save();
        return redirect()->route('asesores_industriales.index')->with('message',"Asesor indsutrial modificado correctamente.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(asesores_industriales $item)
    {
      $item->forceDelete();
      return redirect()->route('asesores_industriales.index')->with('message',"Registro eliminado exitosamente");
    }

    public function toggleStatus(Request $request, asesores_industriales $item)
    {
        $item->update($request->only('activo'));
        if($item->activo==1){
            return redirect()->route('asesores_industriales.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('asesores_industriales.index')->with('message', 'Registro desactivado exitosamente');
        }
    }
}
