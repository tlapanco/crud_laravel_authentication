<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteCompletadosController extends Controller
{
    public function consulta_completadas()
    {
        //Consulta de todos los ciclos escolares
        $ciclos = DB::select('SELECT * FROM ciclo_escolares ORDER BY nombre ASC');
        $procesos = DB::select('SELECT * FROM procesos ORDER BY nombre ASC');

        return view('reportes.solicitudes_completadas.consulta')
            ->with(['ciclos' => $ciclos])
            ->with(['procesos' =>$procesos]);
    } 

    public function contenido_completadas(Request $request)
    {
        //Consulta todos los ciclos escolares
        $ciclos = DB::select('SELECT * FROM ciclo_escolares ORDER BY nombre ASC');
        $procesos = DB::select('SELECT * FROM procesos ORDER BY nombre ASC');

        //idce del ciclo escolar seleccionado
        $idce = $request->get('idce');
        $idp = $request->get('idp');
        //Consulta el nombre del ciclo escolar seleccionado
        $ce_select = DB::select("SELECT ce.nombre AS nombre
        FROM ciclo_escolares AS ce
        WHERE ce.idce = $idce");

        $p_select = DB::select("SELECT p.nombre AS nombre
        FROM procesos AS p
        WHERE p.idp = $idp");
        //Lista los carreras, número de alumnos, número de grupos, del ciclo escolar sellccinado
        $listas = DB::select("
            SELECT
                SUM(t1.alumno)AS nalu,
                t1.nombre AS nombre,
                t1.idca AS idca,
                SUM('1') AS ngru
    
            FROM
            (SELECT
                solicitudes.idg,
                carreras.nombre,
                carreras.idca,
                SUM('1') AS alumno
            FROM estatus
            INNER JOIN solicitudes ON solicitudes.idpe=estatus.idpe 
            INNER JOIN grupos ON grupos.idg = solicitudes.idg   
            INNER JOIN carreras ON carreras.idca =grupos.idca
            WHERE (carta_subido='SI' OR solicitud_estatus='ACEPTADA') AND grupos.idce = $idce AND solicitudes.idp = $idp
            GROUP BY solicitudes.idg,carreras.nombre,carreras.idca) AS t1
            GROUP BY t1.nombre,t1.idca;
        ");

        return view("reportes.solicitudes_completadas.contenido")
            ->with(['$ciclos' => $ciclos])
            ->with(['procesos' =>$procesos])
            ->with(['idce' => $idce])
            ->with(['idp' => $idp])
            ->with(['$ce_select' => $ce_select])
            ->with(['$p_select' => $p_select])
            ->with(['listas' => $listas]);
    }

    public function detalle_carreras_completadas($id, $idce, $idp)
    {
        //idce del ciclo escolar seleccionado
        $idce = $idce;

        //idca de la carrera seleccionada
        $idca = $id;
        $idp = $idp;

        //Consulta el nombre del ciclo escolar y el nombre de la carrera seleccionada
        $datos = DB::select(
        	"SELECT distinct
        	ca.idca as idca, 
        	ce.idce as idce,
        	ca.nombre AS carrera, 
        	ce.nombre AS ciclo  
        	FROM  grupos AS g
        	inner join carreras AS ca ON ca.idca = g.idca
        	inner join ciclo_escolares AS ce ON ce.idce = g.idce
        	where g.idca = $idca && g.idce = $idce"
        );


        //Lista los grupos, número de alumnos que tiene cada grupo
        $listas = DB::select(
        	"SELECT
        	g.nombre AS nombre,
        	g.idg AS idg,
        	COUNT(*) as nalu,
        	sum(estatus.solicitud_estatus='ACEPTADA') as solis,
        	sum(estatus.carta_subido='SI') as cartas
          FROM estatus
          INNER JOIN solicitudes as ac ON ac.idpe = estatus.idpe
          INNER JOIN grupos AS g ON g.idg = ac.idg
          WHERE g.idca = $idca AND g.idce = $idce AND  (carta_subido='SI' OR solicitud_estatus='ACEPTADA') AND ac.idp = $idp
          GROUP BY g.nombre, g.idg");

        return view("reportes.solicitudes_completadas.carrera")
            ->with(['idce' => $idce])
            ->with(['idca' => $idca])
            ->with(['datos' => $datos[0]])
            ->with(['listas' => $listas])
            ->with(['idp' => $idp]);
    }

    public function detalle_solicitudes_completadas($id, $idp, $idce, $idca, Request $request)
    {
        //idg del grupo seleccionado
        $idg = $id;
        $idp = $idp;
        $idce = $idce;
        $idca = $idca;

        //Consulta el nombre del ciclo escolar, nombre de la carrera y nombre del grupo seleccionados
        $datos = DB::select(
            "SELECT distinct
            ce.nombre AS ciclo,
            ca.nombre AS carrera,
            g.nombre AS grupo,
            ce.idce AS idce,
            ca.idca AS idca
            FROM  grupos AS g
            inner join carreras AS ca ON ca.idca = g.idca
            inner join ciclo_escolares AS ce ON ce.idce = g.idce
            where g.idg = $idg"
        );
        

       //Consulta la información de los usuarios que pertenezcan al grupo

       $usuarios = DB::select(
            "SELECT 
            ac.nombre AS nombreu,
            ac.matricula as matricula,
            ac.correo as email
            FROM estatus
            INNER JOIN solicitudes as ac ON ac.idpe = estatus.idpe
            INNER JOIN grupos AS g ON g.idg = ac.idg
            WHERE g.idca = $idca AND g.idce = $idce AND  solicitud_estatus='ACEPTADA' AND ac.idp = $idp and ac.idg=$idg && ac.nombre LIKE '%$request->q%' "
        );

        return view("reportes.solicitudes_completadas.grupos_solicitudes")
            ->with(['idg' => $idg])
            ->with(['datos' => $datos[0]])
            ->with(['usuarios' => $usuarios])
            ->with(['idp' => $idp]);
    }

    public function detalle_cartas_completadas($id, $idp, $idce, $idca, Request $request)
    {
        //idg del grupo seleccionado
        $idg = $id;
        $idp = $idp;
        $idce = $idce;
        $idca = $idca;

        //Consulta el nombre del ciclo escolar, nombre de la carrera y nombre del grupo seleccionados
        $datos = DB::select(
            "SELECT distinct
            ce.nombre AS ciclo,
            ca.nombre AS carrera,
            g.nombre AS grupo,
            ce.idce AS idce, ca.idca AS idca
            FROM  grupos AS g
            inner join carreras AS ca ON ca.idca = g.idca
            inner join ciclo_escolares AS ce ON ce.idce = g.idce
            where g.idg = $idg"
        );
        

       //Consulta la información de los usuarios que pertenezcan al grupo
       
       $usuarios = DB::select(
            "SELECT 
            ac.nombre AS nombreu,
            ac.matricula as matricula,
            ac.correo as email,
            empresas.nombre as empresa
            FROM estatus
            INNER JOIN solicitudes as ac ON ac.idpe = estatus.idpe
            INNER JOIN empresas ON empresas.idem = ac.idem
            INNER JOIN grupos AS g ON g.idg = ac.idg
            WHERE g.idca = $idca AND g.idce = $idce AND  carta_subido='SI' AND ac.idp = $idp and ac.idg=$idg && ac.nombre LIKE '%$request->q%' "
        );

        return view("reportes.solicitudes_completadas.grupos_cartas")
            ->with(['idg' => $idg])
            ->with(['datos' => $datos[0]])
            ->with(['usuarios' => $usuarios])
            ->with(['idp' => $idp]);
    }

    public function regresar_completadas($idce, $idp)
    {
        //Consulta todos los ciclos escolares
        $ciclos = DB::select('SELECT * FROM ciclo_escolares ORDER BY nombre ASC');
        $procesos = DB::select('SELECT * FROM procesos ORDER BY nombre ASC');

        //idce del ciclo escolar seleccionado
        $idce = $idce;
        $idp = $idp;

        //Consulta el nombre del ciclo escolar seleccionado
        $ce_select = DB::select("SELECT ce.nombre AS nombre
        FROM ciclo_escolares AS ce
        WHERE ce.idce = $idce");
        $p_select = DB::select("SELECT ce.nombre AS nombre
        FROM procesos AS ce
        WHERE ce.idp = $idp");

        //Lista los carreras, número de alumnos, número de grupos, del ciclo escolar sellccinado
        $listas = DB::select("
            SELECT
                SUM(t1.alumno)AS nalu,
                t1.nombre AS nombre,
                t1.idca AS idca,
                SUM('1') AS ngru
    
            FROM
            (SELECT
                solicitudes.idg,
                carreras.nombre,
                carreras.idca,
                SUM('1') AS alumno
            FROM estatus
            INNER JOIN solicitudes ON solicitudes.idpe=estatus.idpe 
            INNER JOIN grupos ON grupos.idg = solicitudes.idg   
            INNER JOIN carreras ON carreras.idca =grupos.idca
            WHERE (carta_subido='SI' OR solicitud_estatus='ACEPTADA') AND grupos.idce = $idce AND solicitudes.idp = $idp
            GROUP BY solicitudes.idg,carreras.nombre,carreras.idca) AS t1
            GROUP BY t1.nombre,t1.idca;
        ");

        return view("reportes.solicitudes_completadas.consulta")
            ->with(['ciclos' => $ciclos])
            ->with(['procesos' =>$procesos])
            ->with(['idce' => $idce])
            ->with(['idp' => $idp])
            ->with(['ce_select' => $ce_select])
            ->with(['p_select' => $p_select])
            ->with(['listas' => $listas]);       
    }
}
