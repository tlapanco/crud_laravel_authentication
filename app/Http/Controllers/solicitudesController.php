<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\estudiantes;
use App\Models\Carreras;
use App\Models\solicitudes;
use App\Models\asesores_academicos;
use App\Models\procesos;
use App\Models\tipos;
use App\Models\empresas;
use App\Models\tamaños;
use App\Models\asesores_industriales;
use App\Models\cuatrimestres;
use App\Models\grupos;
use App\Models\CicloEscolar;
use App\Models\estatus;

class solicitudesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
      $items = solicitudes::select('solicitudes.matricula', 'solicitudes.nombre','solicitudes.nombre_del_proyecto',
                    'empresas.nombre as empr','procesos.nombre as proc','procesos.horas as hrs','asesores_academicos.nombre as aseca','asesores_industriales.nombre as asein',
                    'asesores_industriales.cargo as cari','asesores_industriales.telefono as teli','asesores_industriales.correo as cori','carreras.nombre as carre',
                    'solicitudes.fecha_solicitud','solicitudes.fecha_inicio','solicitudes.fecha_termino','cuatrimestres.nombre as cuatri','solicitudes.telefono',
                    'solicitudes.cargo','solicitudes.activo','solicitudes.correo','solicitudes.n_social','tipos.nombre as ti','tamaños.nombre as ta',
                    'empresas.direccion as dic','solicitudes.nombre_contacto','solicitudes.correo_d','solicitudes.telefono_d','solicitudes.idpe','grupos.nombre as grp')
              ->join('carreras', 'carreras.idca', '=', 'solicitudes.idca')
              ->join('empresas', 'empresas.idem', '=', 'solicitudes.idem')
              ->join('asesores_academicos', 'asesores_academicos.idaa', '=', 'solicitudes.idaa')
              ->join('asesores_industriales', 'asesores_industriales.idai', '=', 'solicitudes.idai')
              ->join('cuatrimestres', 'cuatrimestres.idc', '=', 'solicitudes.idc')
              ->join('procesos', 'procesos.idp', '=', 'solicitudes.idp')
              ->join('tipos', 'tipos.idti', '=', 'solicitudes.idti')
              ->join('tamaños', 'tamaños.idta', '=', 'solicitudes.idta')
              ->join('grupos', 'grupos.idg', '=', 'solicitudes.idg')
              ->where('solicitudes.nombre', 'LIKE', "%$request->q%")
              ->paginate( ($request->paginate) ? $request->paginate : 10 );



      /*$items = estudiantes::orderBy('nombre', 'asc')->where('nombre', 'LIKE', "%$request->q%")
              ->paginate( ($request->paginate) ? $request->paginate : 10 );*/
      return view('solicitudes.index', compact('items'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $carreras=Carreras::all();
    $procesos=procesos::all();
    $cuatrimestres=cuatrimestres::all();
    $tipos=tipos::all();
    $tamaños=tamaños::all();
    $asesores_industriales=asesores_industriales::all();
    $asesores_academicos=asesores_academicos::all();
    $empresas=empresas::all();
    $grupos=grupos::all();
    return view('solicitudes.create')
        ->with('Carreras', $carreras)
        ->with('procesos', $procesos)
        ->with('cuatrimestres', $cuatrimestres)
        ->with('tipos', $tipos)
        ->with('tamaños', $tamaños)
        ->with('asesores_industriales', $asesores_industriales)
        ->with('asesores_academicos', $asesores_academicos)
        ->with('empresas', $empresas)
        ->with('grupos', $grupos);
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
        'fecha_solicitud'=>'required|date',
        'matricula'=>'required|regex:/^[0-9]{10}$/',
        'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
        //'idp'=>'required',  
        'telefono'=>'required|regex:/^[0-9]{10}$/',
        'correo'=>'required|email',
        'fecha_inicio'=>'required|date',
        'fecha_termino'=>'required|date',
        //'idc'=>'required',
        //'idca'=>'required',
        'n_social'=>'required|regex:/^[0-9]{13}$/',
        'activo'=>'required',
        //datos empresa
        //'idem'=>'required',
        //'idti'=>'required',
        //'idta'=>'required',
        //datos dirigido
        'nombre_contacto'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
        'cargo'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
        'correo_d'=>'required|email',
        'telefono_d'=>'required|regex:/^[0-9]{10}$/',
        //asesor industrial y academico
        //'idai'=>'required',
        //'idaa'=>'required',
        //'idg'=>'required',

      ]);  
     //echo "exito siguele";
          $solicitudes = new solicitudes;
           $solicitudes->fecha_solicitud= $request->fecha_solicitud;
           $solicitudes->matricula = $request->matricula;
           $solicitudes->nombre = $request->nombre;
           $solicitudes->idp= $request->idp;
           $solicitudes->telefono= $request->telefono;
           $solicitudes->correo= $request->correo;
           $solicitudes->fecha_inicio= $request->fecha_inicio;
           $solicitudes->fecha_termino= $request->fecha_termino;
           $solicitudes->idc= $request->idc;
           $solicitudes->idca= $request->idca;
           $solicitudes->idg= $request->idg;
           $solicitudes->n_social = $request->n_social;
           $solicitudes->activo= $request->activo;
           $solicitudes->idti= $request->idti;
           $solicitudes->idem= $request->idem;
           $solicitudes->idta= $request->idta;
           $solicitudes->nombre_contacto= $request->nombre_contacto;
           $solicitudes->cargo= $request->cargo;
           $solicitudes->correo_d= $request->correo_d;
           $solicitudes->telefono_d= $request->telefono_d;
           $solicitudes->idai= $request->idai;
           $solicitudes->idaa= $request->idaa;
           $solicitudes->save();

          //echo "REGISTRO GUARDADO"; 

          return redirect()->route('solicitudes.index')->with('message', 'Solicitud creado exitosamente');
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
  public function edit(solicitudes $solicitudes)
  {
    
    
    
      $consulta = solicitudes::select('solicitudes.matricula', 'solicitudes.nombre','solicitudes.nombre_del_proyecto',
                    'empresas.nombre as empr','procesos.nombre as proc','procesos.horas as hrs','asesores_academicos.nombre as aseca','asesores_industriales.nombre as asein',
                    'asesores_industriales.cargo as cari','asesores_industriales.telefono as teli','asesores_industriales.correo as cori','carreras.nombre as carre',
                    'solicitudes.fecha_solicitud','solicitudes.fecha_inicio','solicitudes.fecha_termino','cuatrimestres.nombre as cuatri','solicitudes.telefono',
                    'solicitudes.cargo','solicitudes.activo','solicitudes.correo','solicitudes.n_social','grupos.nombre as grp',
                    'empresas.direccion as dir','solicitudes.nombre_contacto','solicitudes.correo_d','solicitudes.telefono_d','solicitudes.idpe','tipos.nombre as ti','tamaños.nombre as ta',
                    'carreras.idca','empresas.idem','asesores_academicos.idaa','asesores_industriales.idai','cuatrimestres.idc','procesos.idp','tipos.idti','tamaños.idta','grupos.idg')
              ->join('carreras', 'carreras.idca', '=', 'solicitudes.idca')
              ->join('empresas', 'empresas.idem', '=', 'solicitudes.idem')
              ->join('asesores_academicos', 'asesores_academicos.idaa', '=', 'solicitudes.idaa')
              ->join('asesores_industriales', 'asesores_industriales.idai', '=', 'solicitudes.idai')
              ->join('cuatrimestres', 'cuatrimestres.idc', '=', 'solicitudes.idc')
              ->join('procesos', 'procesos.idp', '=', 'solicitudes.idp')
              ->join('tipos', 'tipos.idti', '=', 'solicitudes.idti')
              ->join('tamaños', 'tamaños.idta', '=', 'solicitudes.idta')
              ->join('grupos', 'grupos.idg', '=', 'solicitudes.idg')
            ->where('solicitudes.idpe', '=', $solicitudes->idpe)->get(); 
      //return $consulta[0];
      $carreras=Carreras::all();
      $procesos=procesos::all();
      $cuatrimestres=cuatrimestres::all();
      $tipos=tipos::all();
      $tamaños=tamaños::all();
      $asesores_industriales=asesores_industriales::all();
      $asesores_academicos=asesores_academicos::all();
      $empresas=empresas::all();
      $grupos=grupos::all();
      //return $consulta[0];
      return view('solicitudes.edit')
        ->with('consulta',$consulta[0])
        ->with('carreras',$carreras)
        ->with('procesos', $procesos)
        ->with('cuatrimestres', $cuatrimestres)
        ->with('tipos', $tipos)
        ->with('tamaños', $tamaños)
        ->with('asesores_industriales', $asesores_industriales)
        ->with('asesores_academicos', $asesores_academicos)
        ->with('empresas', $empresas)
        ->with('grupos', $grupos);
    
      
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, solicitudes $solicitudes)
  {
     //return $request;
      $this->validate($request,[
        'fecha_solicitud'=>'required|date',
        'matricula'=>'required|regex:/^[0-9]{10}$/',
        'nombre'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
        //'idp'=>'required',
        'telefono'=>'required|regex:/^[0-9]{10}$/',
        'correo'=>'required|email',
        'fecha_inicio'=>'required|date',
        'fecha_termino'=>'required|date',
        //'idc'=>'required',
        //'idca'=>'required',
        //'idag'=>'required',
        'n_social'=>'required|regex:/^[0-9]{13}$/',
        'activo'=>'required',
        //DATOS EMPRESA
        //'idem'=>'required',
        //'idti'=>'required',
        //'idta'=>'required',
        //DATOS DIRIGIDO
        'nombre_contacto'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
        'cargo'=>'required|regex:/^[A-Z][A-Z,a-z, ,é,í,ó,á,ü,ñ,Ñ]+$/',
        'correo_d'=>'required|email',
        'telefono_d'=>'required|regex:/^[0-9]{10}$/',
        //ASESOR INDUSTRIAL Y ACADEMICO
        //'idai'=>'required',
        //'idaa'=>'required',
        
      ]);
     
      $solicitudes = solicitudes::find($solicitudes->idpe);
        $solicitudes->fecha_solicitud= $request->fecha_solicitud;
        $solicitudes->matricula = $request->matricula;
        $solicitudes->nombre = $request->nombre;
        $solicitudes->idp= $request->idp;
        $solicitudes->telefono= $request->telefono;
        $solicitudes->correo= $request->correo;
        $solicitudes->fecha_inicio= $request->fecha_inicio;
        $solicitudes->fecha_termino= $request->fecha_termino;
        $solicitudes->idc= $request->idc;
        $solicitudes->idca= $request->idca;
        $solicitudes->idg= $request->idg;
        $solicitudes->n_social = $request->n_social;
        $solicitudes->activo= $request->activo;
        $solicitudes->idti= $request->idti;
        $solicitudes->idem= $request->idem;
        $solicitudes->idta= $request->idta;
        $solicitudes->nombre_contacto= $request->nombre_contacto;
        $solicitudes->cargo= $request->cargo;
        $solicitudes->correo_d= $request->correo_d;
        $solicitudes->telefono_d= $request->telefono_d;
        $solicitudes->idai= $request->idai;
        $solicitudes->idaa= $request->idaa;
        $solicitudes->save();

        $estatus = estatus::where('estatus.idpe', '=', $solicitudes->idpe)->get();
        //echo "REGISTRO modificado";
      return redirect()->route('estatus.edit', $estatus[0])->with('message', 'Solicitud modificado exitosamente');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(solicitudes $item)
  {
    $item->forceDelete();
    return redirect()->route('solicitudes.index')->with('message',"Registro eliminado exitosamente");
  }

  public function toggleStatus(Request $request, solicitudes $item)
    {
        $item->update($request->only('activo'));
        if($item->activo==1){
            return redirect()->route('solicitudes.index')->with('message', 'Registro activado exitosamente');
        }
        else{
            return redirect()->route('solicitudes.index')->with('message', 'Registro desactivado exitosamente');
        }
    }
}
