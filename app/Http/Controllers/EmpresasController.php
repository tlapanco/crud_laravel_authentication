<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\empresas;
use App\Models\tamaños;
use App\Models\tipos;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $items = empresas::select('empresas.idem','empresas.rfc', 'empresas.nombre','empresas.direccion',
                                'empresas.activo','tipos.nombre as ti','tamaños.nombre as tam')
                      ->join('tipos', 'tipos.idti', '=', 'empresas.idti')
                      ->join('tamaños', 'tamaños.idta', '=', 'empresas.idta')
                      ->paginate( ($request->paginate) ? $request->paginate : 10 );



      //$items = empresas::orderBy('nombre', 'asc')->where('nombre', 'LIKE', "%$request->q%")
                //  ->paginate( ($request->paginate) ? $request->paginate : 10 );
      return view('empresas.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tipos = tipos::all();
      $tamaños = tamaños::all();
      return view('empresas.create')
      ->with('tipos',$tipos)
      ->with('tamaños',$tamaños);
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
          'rfc' => 'regex:/^[A-Z]{4}[0-9]{6}[A-Z,0-9]{3}$/',
          'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
          'direccion'=>'regex:/^[A-Z,a-z, ,0-9]+$/',
          'ciudad'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
          'pagina_web'=>'required',
          'contacto'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
          'correo'=>'required|email',
          'telefono'=>'required|regex:/^[0-9]{10}$/',
          'idti'=>'required',
          'idta'=>'required',
          'activo'=>'required',
      ]);

      $empresas = new empresas;
      $empresas->rfc = $request->rfc;
      $empresas->nombre = $request->nombre;
      $empresas->direccion = $request->direccion;
      $empresas->ciudad = $request->ciudad;
      $empresas->pagina_web = $request->pagina_web;
      $empresas->contacto = $request->contacto;
      $empresas->correo = $request->correo;
      $empresas->telefono = $request->telefono;
      $empresas->activo = $request->activo;
      $empresas->idti = $request->idti;
      $empresas->idta = $request->idta;
      $empresas->save();

      return redirect()->route('empresas.index')->with('message', 'Empresa creada exitosamente');

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
    public function edit(empresas $empresas)
    {


      $consulta = empresas::select('empresas.idem', 'empresas.rfc','empresas.nombre', 'empresas.direccion',
                              'empresas.ciudad','empresas.pagina_web','empresas.activo','empresas.contacto',
                              'empresas.correo','empresas.telefono','tipos.nombre as ti', 'tamaños.nombre as ta')
                              ->join('tipos', 'tipos.idti', '=', 'empresas.idti')
                              ->join('tamaños', 'tamaños.idta', '=', 'empresas.idta')
                              ->where('empresas.idem', '=', $empresas->idem)->get();
      $tipos = tipos::all();
      $tamaños = tamaños::all();

      return view('empresas.edit')
      ->with('consulta', $consulta[0])
      ->with('tipos', $tipos)
      ->with('tamaños',$tamaños);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, empresas $empresas)
     {

         $this->validate($request,[
           'rfc' => 'regex:/^[A-Z]{4}[0-9]{6}[A-Z,0-9]{3}$/',
           'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
           'direccion'=>'regex:/^[A-Z,a-z, ,0-9]+$/',
           'ciudad'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
           'pagina_web'=>'required',
           'contacto'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
           'correo'=>'required|email',
           'telefono'=>'required|regex:/^[0-9]{10}$/',
           'idti'=>'required',
           'idta'=>'required',
           'activo'=>'required',
         ]);
         $empresas = empresas::find($empresas->idem);
         $empresas->rfc = $request->rfc;
         $empresas->nombre = $request->nombre;
         $empresas->direccion = $request->direccion;
         $empresas->ciudad = $request->ciudad;
         $empresas->pagina_web = $request->pagina_web;
         $empresas->contacto = $request->contacto;
         $empresas->correo = $request->correo;
         $empresas->telefono = $request->telefono;
         $empresas->activo = $request->activo;
         $empresas->idti = $request->idti;
         $empresas->idta = $request->idta;
         $empresas->save();
         return redirect()->route('empresas.index')->with('message',"Empresa modificado correctamente."); 
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(empresas $item)
     {
       $item->forceDelete();
       return redirect()->route('empresas.index')->with('message',"Registro eliminado exitosamente");
     }

     public function toggleStatus(Request $request, empresas $item)
     {
         $item->update($request->only('activo'));
         if($item->activo==1){
             return redirect()->route('empresas.index')->with('message', 'Registro activado exitosamente');
         }
         else{
             return redirect()->route('empresas.index')->with('message', 'Registro desactivado exitosamente');
         }
    }
}
