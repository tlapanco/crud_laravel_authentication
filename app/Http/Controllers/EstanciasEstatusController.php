<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\estatus;

class EstanciasEstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = estatus::select(
            'estatus.ides',
            'estatus.idpe',
            'estatus.solicitud_estatus' ,
            'estatus.carta_subido',            
            'solicitudes.nombre',
            'solicitudes.matricula',
            'procesos.nombre as proceso',
            'empresas.nombre as empresa')
        ->join('solicitudes', 'solicitudes.idpe', '=', 'estatus.idpe')
        ->join('procesos', 'procesos.idp', '=', 'solicitudes.idp')
        ->join('empresas', 'empresas.idem', '=', 'solicitudes.idem')
        ->where('solicitudes.matricula', 'LIKE', "%$request->q%")
        ->where('estatus.solicitud_estatus', '=', 'PENDIENTE')
        ->paginate( ($request->paginate) ? $request->paginate : 10 );
        return view('estancias_estatus.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param \App\Models\solicitudes
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(estatus $estatus)
    {

        $consulta = estatus::select
        (  
            'estatus.ides',
            'estatus.idpe',
            'estatus.solicitud_estatus',            
            'estatus.carta_subido',
            'solicitudes.matricula',
            'solicitudes.idpe',
            'solicitudes.nombre',            
            'solicitudes.nombre_del_proyecto',
            'solicitudes.fecha_solicitud',
            'solicitudes.fecha_inicio',
            'solicitudes.fecha_termino',
            'solicitudes.telefono', 
            'solicitudes.correo',
            'solicitudes.n_social',
            'solicitudes.nombre_contacto',
            'solicitudes.cargo as cargo_contacto',
            'solicitudes.correo_d',
            'solicitudes.telefono_d',            
            'procesos.nombre as proceso',
            'procesos.horas',
            'asesores_academicos.nombre as aacademico_n',
            'asesores_academicos.apellido_paterno as aacademico_ap',
            'asesores_academicos.apellido_materno as aacademico_am', 
            'asesores_academicos.correo as correo_aa'           ,
            'asesores_academicos.telefono as telefono_aa',
            'asesores_academicos.titulo',
            'asesores_industriales.nombre as aindustrial_n',
            'asesores_industriales.apellido_paterno as aindustrial_ap',
            'asesores_industriales.apellido_materno as aindustrial_am',
            'asesores_industriales.rfc as rfc_ai',
            'asesores_industriales.cargo as cargo_ai',
            'asesores_industriales.telefono as telefono_ai',
            'asesores_industriales.correo as correo_ai',
            'carreras.nombre as carrera',
            'cuatrimestres.nombre as cuatrimestre',
            'empresas.nombre as empresa',
            'empresas.rfc as rfc_empresa',
            'empresas.direccion',
            'empresas.ciudad',
            'empresas.pagina_web',
            'tipos.nombre as tipo',
            'tamaños.nombre as tamaño',
            'grupos.nombre as grupo'          
        )        
        ->join('solicitudes', 'solicitudes.idpe', '=', "estatus.idpe")
        ->join('procesos', 'procesos.idp', '=', 'solicitudes.idp')
        ->join('asesores_academicos', 'asesores_academicos.idaa', '=', 'solicitudes.idaa')
        ->join('asesores_industriales', 'asesores_industriales.idai', '=', 'solicitudes.idai')
        ->join('carreras', 'carreras.idca', '=', 'solicitudes.idca')
        ->join('cuatrimestres', 'cuatrimestres.idc', '=', 'solicitudes.idc')
        ->join('empresas', 'empresas.idem', '=', 'solicitudes.idem')  
        ->join('grupos', 'grupos.idg', '=', 'solicitudes.idg')
        ->join('tipos', 'tipos.idti', '=', 'empresas.idti')
        ->join('tamaños', 'tamaños.idta', '=', 'empresas.idta')
        ->where('estatus.idpe','=',$estatus->idpe)     
        ->get();
        
        return view('estancias_estatus.edit')
        ->with('consulta', $consulta[0]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estatus $estatus)
    {
        $this->validate($request, [ 
            'solicitud_estatus' => 'required'
        ]);
        
        $estatus = estatus::find($estatus->ides);
        $estatus->solicitud_estatus = $request->solicitud_estatus;        
        $estatus->observaciones = $request->observaciones;
        // $estatus->activo = $request->activo;
        $estatus->save();
        return redirect()->route('estatus.index')
         ->with('message', 'El estatus de la solicitud ha sido modificado exitosamente');
    }

  
}
