<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;
use App\Models\Coordinacion;
use Illuminate\Support\Facades\DB;

class ConsultaController extends Controller
{
   public function index(Request $request){

        $fichas = Ficha::all();

        $apre = Ficha::all()->sum('total_apre');

        $act = Ficha::all()->sum('total_act');

        $retencion= Ficha::selectRaw('(round((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->get();
        $desercion= Ficha::selectRaw('round(100-((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->get();

        $retirados = DB::table('fichas')
        ->selectRaw('(sum(total_apre) - sum(total_act)) AS retirado')
        ->get();

        $porcentajed = Ficha::selectRaw( 'id_coor, round((sum(total_act)  / sum(total_apre))*100) AS totald, round(100-((sum(total_act) * 100) / sum(total_apre))) AS totalr' )
        ->groupBy('id_coor')
        ->get();

        $porcentajer = Ficha::selectRaw( 'id_coor, round(100-((sum(total_act) * 100) / sum(total_apre))) AS total' )
        ->groupBy('id_coor')
        ->get();

        $datos = Ficha::selectRaw('id_coor, (SUM(total_apre) - sum(total_act)) AS registro_coordinacion, SUM(total_act) AS suma_total_act, round((sum(total_act)  / sum(total_apre))*100) AS totald, round(100-((sum(total_act) * 100) / sum(total_apre))) AS totalr'  )
        ->groupBy('id_coor')
        ->orderByDesc('registro_coordinacion')
        ->get();

        $request->user()->authorizeRoles([ 'admin']);


        return view('consulta.index', compact('fichas', 'apre', 'act', 'datos', 'porcentajed', 'porcentajer', 'retirados', 'desercion', 'retencion'));
    }


    private $coordinacions;

    public function  __construct(){
        $this->coordinacions = Coordinacion::pluck('id', 'nom_coor');
        $this->middleware('auth');
    }

    /* Buscar general */
    public function buscar(Request $request){

        $buscarporid=$request->get('buscarporid');


        $fichs = DB::table('coordinacions')
       ->selectRaw('fichas.id, fichas.id_coor, coordinacions.nom_coor as nom_cor, (total_apre - total_act) as desertados')
       ->join('fichas', 'coordinacions.id', '=', 'fichas.id_coor')
       ->where('coordinacions.nom_coor', 'like','%'.$buscarporid.'%')
       ->orwhere('fichas.id', 'like','%'.$buscarporid.'%')
       ->having('desertados', '>=', 1)
       ->orderByDesc('desertados')
       ->get();

       $datos = Ficha::selectRaw('id_coor, (SUM(total_apre) - sum(total_act)) AS registro_coordinacion, SUM(total_act) AS suma_total_act, round((sum(total_act)  / sum(total_apre))*100) AS totald, round(100-((sum(total_act) * 100) / sum(total_apre))) AS totalr'  )
       ->groupBy('id_coor')
       ->orderByDesc('registro_coordinacion')
       ->get();
       $request->user()->authorizeRoles([ 'admin']);
       return view('consulta.modal', compact('buscarporid', 'fichs', 'datos'));
    }
    public function BI(Request $request) {
        $request->user()->authorizeRoles([ 'admin']);
    return view('consulta.BI');
    }


    /* Niveles ficha */
    public function nivelCE(Request $request) {

        $cursos = Ficha::selectRaw('id, estado, total_act, total_apre, nivel, fecha_in, fecha_fin, id_coor')
        ->where('nivel', 'curso especial')
        ->paginate(15);
        $request->user()->authorizeRoles([ 'admin']);
        return view('ficha.nivel', compact ('cursos'));
    }

    public function nivelTecn(Request $request) {


        $apre = Ficha::selectRaw('SUM(total_apre) as total')
        ->where('nivel', 'tecnologo')
        ->get();

        $act = Ficha::selectRaw('SUM(total_act) as total')
        ->where('nivel', 'tecnologo')
        ->get();

        $retirados = DB::table('fichas')
        ->selectRaw('(sum(total_apre) - sum(total_act)) AS retirado')
        ->where('nivel', 'tecnologo')
        ->get();
        $retencion= Ficha::selectRaw('(round((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'tecnologo')
        ->get();
        $desercion= Ficha::selectRaw('round(100-((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'tecnologo')
        ->get();

        $request->user()->authorizeRoles([ 'admin']);
        $tecnologos = Ficha::selectRaw('id, estado, total_act, total_apre, nivel, fecha_in, fecha_fin, id_coor')
        ->where('nivel', 'tecnologo')
        ->paginate(15);
        return view('ficha.tecnologo', compact ('tecnologos', 'apre', 'act', 'retirados','retencion', 'desercion'));
    }


    public function nivelEs(Request $request) {


        $apre = Ficha::selectRaw('SUM(total_apre) as total')
        ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->get();

        $act = Ficha::selectRaw('SUM(total_act) as total')
        ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->get();

        $retirados = DB::table('fichas')
        ->selectRaw('(sum(total_apre) - sum(total_act)) AS retirado')
        ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->get();
        $retencion= Ficha::selectRaw('(round((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->get();
        $desercion= Ficha::selectRaw('round(100-((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->get();


        $especiali = Ficha::selectRaw('id, estado, total_act, total_apre, nivel, fecha_in, fecha_fin, id_coor')
        ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->paginate(15);
        $request->user()->authorizeRoles([ 'admin']);
        return view('ficha.especializacion', compact ('especiali', 'apre', 'act', 'retirados','retencion', 'desercion'));
    }

    public function nivelTec(Request $request) {


        $apre = Ficha::selectRaw('SUM(total_apre) as total')
        ->where('nivel', 'tecnico')
        ->get();

        $act = Ficha::selectRaw('SUM(total_act) as total')
        ->where('nivel', 'tecnico')
        ->get();

        $retirados = DB::table('fichas')
        ->selectRaw('(sum(total_apre) - sum(total_act)) AS retirado')
        ->where('nivel', 'tecnico')
        ->get();
        $retencion= Ficha::selectRaw('(round((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'tecnico')
        ->get();
        $desercion= Ficha::selectRaw('round(100-((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'tecnico')
        ->get();


        $tecnicos = Ficha::selectRaw('id, estado, total_act, total_apre, nivel, fecha_in, fecha_fin, id_coor')
        ->where('nivel', 'tecnico')
        ->paginate(15);
        $request->user()->authorizeRoles([ 'admin']);
        return view('ficha.tecnico', compact ('tecnicos', 'apre', 'act', 'retirados','retencion', 'desercion'));
    }

    public function nivelEvento(Request $request) {


        $apre = Ficha::selectRaw('SUM(total_apre) as total')
        ->where('nivel', 'evento')
        ->get();

        $act = Ficha::selectRaw('SUM(total_act) as total')
        ->where('nivel', 'evento')
        ->get();

        $retirados = DB::table('fichas')
        ->selectRaw('(sum(total_apre) - sum(total_act)) AS retirado')
        ->where('nivel', 'evento')
        ->get();
        $retencion= Ficha::selectRaw('(round((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'evento')
        ->get();
        $desercion= Ficha::selectRaw('round(100-((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'evento')
        ->get();


        $eventos = Ficha::selectRaw('id, estado, total_act, total_apre, nivel, fecha_in, fecha_fin, id_coor')
        ->where('nivel', 'evento')
        ->paginate(15);
        $request->user()->authorizeRoles([ 'admin']);
        return view('ficha.evento', compact ('eventos', 'apre', 'act', 'retirados','retencion', 'desercion'));
    }


    /* Reportes por nivel */

    public function reporteCE(Request $request){

        $buscarporCE=$request->get('buscarporCE');


        $apre = Ficha::selectRaw('SUM(total_apre) as total')
        ->where('nivel', 'curso especial')
        ->get();

        $act = Ficha::selectRaw('SUM(total_act) as total')
        ->where('nivel', 'curso especial')
        ->get();

        $retirados = DB::table('fichas')
        ->selectRaw('(round(sum(total_apre) - sum(total_act))) AS retirado')
        ->where('nivel', 'curso especial')
        ->get();
        $retencion= Ficha::selectRaw('(round((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'curso especial')
        ->get();
        $desercion= Ficha::selectRaw('round(100-((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'curso especial')
        ->get();



        $reporteCE = Ficha::selectRaw('id_coor, (SUM(total_apre) - sum(total_act)) AS registro_coordinacion, SUM(total_act) AS suma_total_act, round((sum(total_act)  / sum(total_apre))*100) AS totald, round(100-((sum(total_act) * 100) / sum(total_apre))) AS totalr'  )
        ->where('nivel', 'curso especial')
        ->groupBy('id_coor')
        ->orderByDesc('registro_coordinacion')
        ->get();
        $request->user()->authorizeRoles([ 'admin']);
        return view('consulta.reporteCE', compact ('reporteCE', 'apre', 'act', 'retirados','retencion', 'desercion'));
    }
    public function reporteTecn(Request $request){

        $buscarporTecn=$request->get('buscarporTecn');


        $apre = Ficha::selectRaw('SUM(total_apre) as total')
        ->where('nivel', 'tecnologo')
        ->get();

        $act = Ficha::selectRaw('SUM(total_act) as total')
        ->where('nivel', 'tecnologo')
        ->get();

        $retirados = DB::table('fichas')
        ->selectRaw('(round(sum(total_apre) - sum(total_act))) AS retirado')
        ->where('nivel', 'tecnologo')
        ->get();
        $retencion= Ficha::selectRaw('(round((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'tecnologo')
        ->get();
        $desercion= Ficha::selectRaw('round(100-((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'tecnologo')
        ->get();



        $reporteTecn = Ficha::selectRaw('id_coor, (SUM(total_apre) - sum(total_act)) AS registro_coordinacion, SUM(total_act) AS suma_total_act, round((sum(total_act)  / sum(total_apre))*100) AS totald, round(100-((sum(total_act) * 100) / sum(total_apre))) AS totalr'  )
        ->where('nivel', 'tecnologo')
        ->groupBy('id_coor')
        ->orderByDesc('registro_coordinacion')
        ->get();
        $request->user()->authorizeRoles([ 'admin']);
        return view('consulta.reporteTecn', compact ('reporteTecn', 'apre', 'act', 'retirados','retencion', 'desercion'));
    }
    public function reporteEs(Request $request){

        $buscarporEs=$request->get('buscarporEs');


        $apre = Ficha::selectRaw('SUM(total_apre) as total')
        ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->get();

        $act = Ficha::selectRaw('SUM(total_act) as total')
        ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->get();

        $retirados = DB::table('fichas')
        ->selectRaw('(round(sum(total_apre) - sum(total_act))) AS retirado')
        ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->get();
        $retencion= Ficha::selectRaw('(round((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->get();
        $desercion= Ficha::selectRaw('round(100-((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->get();



        $reporteEs = Ficha::selectRaw('id_coor, (SUM(total_apre) - sum(total_act)) AS registro_coordinacion, SUM(total_act) AS suma_total_act, round((sum(total_act)  / sum(total_apre))*100) AS totald, round(100-((sum(total_act) * 100) / sum(total_apre))) AS totalr'  )
        ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->groupBy('id_coor')
        ->orderByDesc('registro_coordinacion')
        ->get();
        $request->user()->authorizeRoles([ 'admin']);
        return view('consulta.reporteEs', compact ('reporteEs', 'apre', 'act', 'retirados','retencion', 'desercion'));
    }
    public function reporteEvento(Request $request){

        $buscarporEv=$request->get('buscarporEv');


        $apre = Ficha::selectRaw('SUM(total_apre) as total')
        ->where('nivel', 'evento')
        ->get();

        $act = Ficha::selectRaw('SUM(total_act) as total')
        ->where('nivel', 'evento')
        ->get();

        $retirados = DB::table('fichas')
        ->selectRaw('(round(sum(total_apre) - sum(total_act))) AS retirado')
        ->where('nivel', 'evento')
        ->get();
        $retencion= Ficha::selectRaw('(round((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'evento')
        ->get();
        $desercion= Ficha::selectRaw('round(100-((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'evento')
        ->get();



        $reporteEv = Ficha::selectRaw('id_coor, (SUM(total_apre) - sum(total_act)) AS registro_coordinacion, SUM(total_act) AS suma_total_act, round((sum(total_act)  / sum(total_apre))*100) AS totald, round(100-((sum(total_act) * 100) / sum(total_apre))) AS totalr'  )
        ->where('nivel', 'evento')
        ->groupBy('id_coor')
        ->orderByDesc('registro_coordinacion')
        ->get();
        $request->user()->authorizeRoles([ 'admin']);
        return view('consulta.reporteEvento', compact ('reporteEv', 'apre', 'act', 'retirados','retencion', 'desercion'));
    }


    public function reporteTec(Request $request){

        $buscarporTec=$request->get('buscarporTec');


        $apre = Ficha::selectRaw('SUM(total_apre) as total')
        ->where('nivel', 'tecnico')
        ->get();

        $act = Ficha::selectRaw('SUM(total_act) as total')
        ->where('nivel', 'tecnico')
        ->get();

        $retirados = DB::table('fichas')
        ->selectRaw('(round(sum(total_apre) - sum(total_act))) AS retirado')
        ->where('nivel', 'tecnico')
        ->get();
        $retencion= Ficha::selectRaw('(round((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'tecnico')
        ->get();
        $desercion= Ficha::selectRaw('round(100-((sum(total_act) * 100) / sum(total_apre))) AS total')
        ->where('nivel', 'tecnico')
        ->get();



        $reporteTec = Ficha::selectRaw(' id_coor,  (SUM(total_apre) - sum(total_act)) AS registro_coordinacion, SUM(total_act) AS suma_total_act, round((sum(total_act)  / sum(total_apre))*100) AS totald, round(100-((sum(total_act) * 100) / sum(total_apre))) AS totalr'  )
        ->where('nivel', 'tecnico')
        ->groupBy('id_coor')
        ->orderByDesc('registro_coordinacion')
        ->get();
        $request->user()->authorizeRoles([ 'admin']);
        return view('consulta.reporteTec', compact ('reporteTec', 'apre', 'act', 'retirados','retencion', 'desercion'));
    }

    /* Fichas segun nivel */
    public function fichaCE(Request $request) {

        $buscarporCE=$request->get('buscarporCE');
        $ces = Ficha::selectRaw('id, id_coor, nivel,  total_apre, total_act, fecha_in,fecha_fin, (total_apre - total_act) as desertados, (((total_act * 100) / (total_apre))) AS totalRetencion, (100-((total_act * 100) / total_apre)) AS totalDersercion' )
        ->where('nivel', 'curso especial')
        ->having('desertados', '>=', 1)
        ->orderByDesc('desertados')
        ->get();

        $datos = Ficha::selectRaw('id_coor, (SUM(total_apre) - sum(total_act)) AS registro_coordinacion, SUM(total_act) AS suma_total_act, round((sum(total_act)  / sum(total_apre))*100) AS totald, round(100-((sum(total_act) * 100) / sum(total_apre))) AS totalr'  )
       ->where('nivel', 'curso especial')
        ->groupBy('id_coor')
       ->orderByDesc('registro_coordinacion')
       ->get();
       $request->user()->authorizeRoles([ 'admin']);
        return view('consulta.fichaCE', compact('ces', 'datos', 'buscarporCE'));
    }

    public function fichaTec(Request $request) {

        $buscarporTec=$request->get('buscarporTec');


        $tec =Ficha::selectRaw('id, id_coor, nivel, total_apre, total_act, fecha_in, fecha_fin,(total_apre - total_act) as desertados, (total_apre - total_act) as desertados, (round((total_act * 100) / (total_apre))) AS totalRetencion, round(100-((total_act * 100) / total_apre)) AS totalDersercion')
        ->where('nivel', 'tecnico')
        ->having('desertados', '>=', 1)
        ->orderByDesc('desertados')
        ->get();

        $datosTec = Ficha::selectRaw('id_coor, (SUM(total_apre) - sum(total_act)) AS registro_coordinacion, SUM(total_act) AS suma_total_act, round((sum(total_act)  / sum(total_apre))*100) AS totald, round(100-((sum(total_act) * 100) / sum(total_apre))) AS totalr'  )
       ->where('nivel', 'tecnico')
        ->groupBy('id_coor')
       ->orderByDesc('registro_coordinacion')
       ->get();
       $request->user()->authorizeRoles([ 'admin']);
        return view('consulta.fichaTec', compact('tec', 'datosTec', 'buscarporTec'));;
    }

    public function fichaEs(Request $request) {

        $buscarporEs=$request->get('buscarporEs');
        $ess = Ficha::selectRaw('id, id_coor, nivel, total_apre , total_act,fecha_in, fecha_fin,(total_apre - total_act) as desertados, (total_apre - total_act) as desertados, (round((total_act * 100) / (total_apre))) AS totalRetencion, round(100-((total_act * 100) / total_apre)) AS totalDersercion')
        ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->having('desertados', '>=', 1)
        ->orderByDesc('desertados')
        ->get();

        $datos = Ficha::selectRaw('id_coor, (SUM(total_apre) - sum(total_act)) AS registro_coordinacion, SUM(total_act) AS suma_total_act, round((sum(total_act)  / sum(total_apre))*100) AS totald, round(100-((sum(total_act) * 100) / sum(total_apre))) AS totalr'  )
       ->where('nivel', 'ESPECIALIZACIÓN TECNOLÓGICA')
        ->groupBy('id_coor')
       ->orderByDesc('registro_coordinacion')
       ->get();
       $request->user()->authorizeRoles([ 'admin']);
        return view('consulta.fichaEs', compact('ess', 'datos', 'buscarporEs'));
    }
    public function fichaEvento(Request $request) {

        $buscarporEv=$request->get('buscarporEv');
        $evs = Ficha::selectRaw('id, id_coor, nivel, total_apre, total_act, fecha_in,fecha_fin, (total_apre - total_act) as desertados, (total_apre - total_act) as desertados, (round((total_act * 100) / (total_apre))) AS totalRetencion, round(100-((total_act * 100) / total_apre)) AS totalDersercion')
        ->where('nivel', 'evento')
        ->having('desertados', '>=', 1)
        ->orderByDesc('desertados')
        ->get();

        $datos = Ficha::selectRaw('id_coor, (SUM(total_apre) - sum(total_act)) AS registro_coordinacion, SUM(total_act) AS suma_total_act, round((sum(total_act)  / sum(total_apre))*100) AS totald, round(100-((sum(total_act) * 100) / sum(total_apre))) AS totalr'  )
       ->where('nivel', 'evento')
        ->groupBy('id_coor')
       ->orderByDesc('registro_coordinacion')
       ->get();
       $request->user()->authorizeRoles([ 'admin']);
        return view('consulta.fichaEvento', compact('evs', 'datos', 'buscarporEv'));
    }
    public function fichaTecn(Request $request) {

        $buscarporTecn=$request->get('buscarporTecn');
        $tecns = Ficha::selectRaw('id, id_coor, nivel, total_apre, total_act, fecha_in, fecha_fin,  (total_apre - total_act) as desertados, (total_apre - total_act) as desertados, (round((total_act * 100) / (total_apre))) AS totalRetencion, round(100-((total_act * 100) / total_apre)) AS totalDersercion')
        ->where('nivel', 'tecnologo')
        ->having('desertados', '>=', 1)
        ->orderByDesc('desertados')
        ->get();

        $datostecn = Ficha::selectRaw('id_coor, (SUM(total_apre) - sum(total_act)) AS registro_coordinacion, SUM(total_act) AS suma_total_act, round((sum(total_act)  / sum(total_apre))*100) AS totald, round(100-((sum(total_act) * 100) / sum(total_apre))) AS totalr'  )
       ->where('nivel', 'tecnologo')
        ->groupBy('id_coor')
       ->orderByDesc('registro_coordinacion')
       ->get();
       $request->user()->authorizeRoles([ 'admin']);
        return view('consulta.fichaTecn', compact('tecns', 'datostecn', 'buscarporTecn'));
    }





}
