<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ficha;
use App\Models\Coordinacion;
use Illuminate\Support\Facades\DB;

class CoordinadoresController extends Controller
{


    private $coordinacions;

    public function  __construct()
    {
        $this->coordinacions = Coordinacion::pluck('id', 'nom_coor');
        $this->middleware('auth');
    }


    #1
    public function adrianaCoordinador(Request $request)
    {

        $datosAdriana = Ficha::selectRaw('id, id_coor, nivel, estado, fecha_in, fecha_fin, total_apre, total_act ')
            ->where('id_coor', 1)
            ->orderBy('total_apre')
            ->get();
            $request->user()->authorizeRoles([ 'adriana']);
        return view('Coordinadores.adriana.ficha', compact('datosAdriana'));
    }

    public function repoAdri(Request $request)
    {
           $niveles = Ficha::selectRaw('nivel, sum(total_apre) as total_matriculados, sum(total_act) as total_activos, (sum(total_apre) - sum(total_act)) as total_desertados, round(sum(total_act)*100 / sum(total_apre)) AS total_retencion, round(100-(sum(total_act)*100 / sum(total_apre))) AS total_desercion')
            ->where('id_coor', 1)
            ->groupBy('nivel')
            ->get();
            $request->user()->authorizeRoles([ 'adriana']);

        return view('Coordinadores.adriana.niveles', compact('niveles'));
    }

    public function reporteAdriana(Request $request)
    {

        $buscarporC = $request->get('buscarporC');

        $apre = Ficha::selectRaw('SUM(total_apre) as total')
            ->where('id_coor', 1)
            ->get();

        $act = Ficha::selectRaw('SUM(total_act) as total')
            ->where('id_coor', 1)
            ->get();

        $retirados = DB::table('fichas')
            ->selectRaw('round(sum(total_apre) - sum(total_act)) AS retirado')
            ->where('id_coor', 1)
            ->get();
        $retencion = Ficha::selectRaw('round(sum(total_act)*100 / sum(total_apre)) AS total')
            ->where('id_coor', 1)
            ->get();
        $desercion = Ficha::selectRaw('round(100-(sum(total_act)*100 / sum(total_apre))) AS total')
            ->where('id_coor', 1)
            ->get();

        $reporteAdriana = Ficha::selectRaw('id, nivel, total_apre - total_act AS registro_coordinacion, total_act AS suma_total_act, round((total_act  / total_apre)*100) AS totald, round(100-((total_act * 100) / total_apre)) AS totalr')
            ->where('id_coor', 1)
            ->orderByDesc('registro_coordinacion')
            ->get();
            $request->user()->authorizeRoles([ 'adriana']);
        return view('Coordinadores.adriana.reporte', compact('reporteAdriana', 'apre', 'act', 'retirados', 'retencion', 'desercion'));
    }



    #2
    public function aldoCoordinador(Request $request)
    {

        $datosAldo = Ficha::selectRaw('id, id_coor, nivel, estado, fecha_in, fecha_fin, total_apre, total_act ')
            ->where('id_coor', 2)
            ->orderBy('total_apre')
            ->get();
            $request->user()->authorizeRoles([ 'aldo']);
        return view('Coordinadores.aldo.ficha', compact('datosAldo'));
    }

    public function repoAl(Request $request)
    {
           $niveles = Ficha::selectRaw('nivel, sum(total_apre) as total_matriculados, sum(total_act) as total_activos, (sum(total_apre) - sum(total_act)) as total_desertados, round(sum(total_act)*100 / sum(total_apre)) AS total_retencion, round(100-(sum(total_act)*100 / sum(total_apre))) AS total_desercion')
            ->where('id_coor', 2)
            ->groupBy('nivel')
            ->get();

            $request->user()->authorizeRoles([ 'aldo']);
        return view('Coordinadores.aldo.niveles', compact('niveles'));
    }

    public function reporteAldo(Request $request)
    {

        $buscarporC = $request->get('buscarporC');

        $apre = Ficha::selectRaw('SUM(total_apre) as total')
            ->where('id_coor', 2)
            ->get();

        $act = Ficha::selectRaw('SUM(total_act) as total')
            ->where('id_coor', 2)
            ->get();

        $retirados = DB::table('fichas')
            ->selectRaw('round(sum(total_apre) - sum(total_act)) AS retirado')
            ->where('id_coor', 2)
            ->get();
        $retencion = Ficha::selectRaw('round(sum(total_act)*100 / sum(total_apre)) AS total')
            ->where('id_coor', 2)
            ->get();
        $desercion = Ficha::selectRaw('round(100-(sum(total_act)*100 / sum(total_apre))) AS total')
            ->where('id_coor', 2)
            ->get();

        $reporteAldo = Ficha::selectRaw('id, nivel, total_apre - total_act AS registro_coordinacion, total_act AS suma_total_act, round((total_act  / total_apre)*100) AS totald, round(100-((total_act * 100) / total_apre)) AS totalr')
            ->where('id_coor', 2)
            ->orderByDesc('registro_coordinacion')
            ->get();
            $request->user()->authorizeRoles([ 'aldo']);
        return view('Coordinadores.aldo.reporte', compact('reporteAldo', 'apre', 'act', 'retirados', 'retencion', 'desercion'));
    }



    #3
    public function cesarCoordinador(Request $request)
    {

        $datosC = Ficha::selectRaw('id, id_coor, nivel, estado, fecha_in, fecha_fin, total_apre, total_act ')
            ->where('id_coor', 3)
            ->orderBy('total_apre')
            ->get();
            $request->user()->authorizeRoles([ 'cesar']);
        return view('Coordinadores.cesarC.index', compact('datosC'));
    }

    public function repoCE(Request $request)
    {
           $niveles = Ficha::selectRaw('nivel, sum(total_apre) as total_matriculados, sum(total_act) as total_activos, (sum(total_apre) - sum(total_act)) as total_desertados, round(sum(total_act)*100 / sum(total_apre)) AS total_retencion, round(100-(sum(total_act)*100 / sum(total_apre))) AS total_desercion')
            ->where('id_coor', 3)
            ->groupBy('nivel')
            ->get();

            $request->user()->authorizeRoles([ 'cesar']);
        return view('Coordinadores.cesarC.repoCE', compact('niveles'));
    }


    public function reporteCesar(Request $request)
    {

        $buscarporC = $request->get('buscarporC');


        $apre = Ficha::selectRaw('SUM(total_apre) as total')
            ->where('id_coor', 3)
            ->get();

        $act = Ficha::selectRaw('SUM(total_act) as total')
            ->where('id_coor', 3)
            ->get();

        $retirados = DB::table('fichas')
            ->selectRaw('round(sum(total_apre) - sum(total_act)) AS retirado')
            ->where('id_coor', 3)
            ->get();
        $retencion = Ficha::selectRaw('round(sum(total_act)*100 / sum(total_apre)) AS total')
            ->where('id_coor', 3)
            ->get();
        $desercion = Ficha::selectRaw('round(100-(sum(total_act)*100 / sum(total_apre))) AS total')
            ->where('id_coor', 3)
            ->get();



        $reporteCesar = Ficha::selectRaw('id, nivel, total_apre - total_act AS registro_coordinacion, total_act AS suma_total_act, round((total_act  / total_apre)*100) AS totald, round(100-((total_act * 100) / total_apre)) AS totalr')
            ->where('id_coor', 3)
            ->orderByDesc('registro_coordinacion')
            ->get();
            $request->user()->authorizeRoles([ 'cesar']);
        return view('Coordinadores.cesarC.reporteCesar', compact('reporteCesar', 'apre', 'act', 'retirados', 'retencion', 'desercion'));
    }

     #4
     public function elkinCoordinador(Request $request)
     {

         $datosElkin = Ficha::selectRaw('id, id_coor, nivel, estado, fecha_in, fecha_fin, total_apre, total_act ')
             ->where('id_coor', 4)
             ->orderBy('total_apre')
             ->get();
             $request->user()->authorizeRoles([ 'elkin']);
         return view('Coordinadores.elkin.ficha', compact('datosElkin'));
     }

     public function repoElk(Request $request)
     {
            $niveles = Ficha::selectRaw('nivel, sum(total_apre) as total_matriculados, sum(total_act) as total_activos, (sum(total_apre) - sum(total_act)) as total_desertados, round(sum(total_act)*100 / sum(total_apre)) AS total_retencion, round(100-(sum(total_act)*100 / sum(total_apre))) AS total_desercion')
             ->where('id_coor', 4)
             ->groupBy('nivel')
             ->get();
             $request->user()->authorizeRoles([ 'elkin']);

         return view('Coordinadores.elkin.niveles', compact('niveles'));
     }


     public function reporteElkin(Request $request)
     {

         $buscarporC = $request->get('buscarporC');


         $apre = Ficha::selectRaw('SUM(total_apre) as total')
             ->where('id_coor', 4)
             ->get();

         $act = Ficha::selectRaw('SUM(total_act) as total')
             ->where('id_coor', 4)
             ->get();

         $retirados = DB::table('fichas')
             ->selectRaw('round(sum(total_apre) - sum(total_act)) AS retirado')
             ->where('id_coor', 4)
             ->get();
         $retencion = Ficha::selectRaw('round(sum(total_act)*100 / sum(total_apre)) AS total')
             ->where('id_coor', 4)
             ->get();
         $desercion = Ficha::selectRaw('round(100-(sum(total_act)*100 / sum(total_apre))) AS total')
             ->where('id_coor', 4)
             ->get();



         $reporteElkin = Ficha::selectRaw('id, nivel, total_apre - total_act AS registro_coordinacion, total_act AS suma_total_act, round((total_act  / total_apre)*100) AS totald, round(100-((total_act * 100) / total_apre)) AS totalr')
             ->where('id_coor', 4)
             ->orderByDesc('registro_coordinacion')
             ->get();
             $request->user()->authorizeRoles([ 'elkin']);
         return view('Coordinadores.elkin.reporte', compact('reporteElkin', 'apre', 'act', 'retirados', 'retencion', 'desercion'));
     }


     #5
     public function huiCoordinador(Request $request)
     {

         $datosHui = Ficha::selectRaw('id, id_coor, nivel, estado, fecha_in, fecha_fin, total_apre, total_act ')
             ->where('id_coor', 5)
             ->orderBy('total_apre')
             ->get();
             $request->user()->authorizeRoles([ 'hui']);
         return view('Coordinadores.hui.ficha', compact('datosHui'));
     }

     public function repoHui(Request $request)
     {
            $niveles = Ficha::selectRaw('nivel, sum(total_apre) as total_matriculados, sum(total_act) as total_activos, (sum(total_apre) - sum(total_act)) as total_desertados, round(sum(total_act)*100 / sum(total_apre)) AS total_retencion, round(100-(sum(total_act)*100 / sum(total_apre))) AS total_desercion')
             ->where('id_coor', 5)
             ->groupBy('nivel')
             ->get();
             $request->user()->authorizeRoles([ 'hui']);

         return view('Coordinadores.hui.niveles', compact('niveles'));
     }


     public function reporteHui(Request $request)
     {

         $buscarporC = $request->get('buscarporC');


         $apre = Ficha::selectRaw('SUM(total_apre) as total')
             ->where('id_coor', 5)
             ->get();

         $act = Ficha::selectRaw('SUM(total_act) as total')
             ->where('id_coor', 5)
             ->get();

         $retirados = DB::table('fichas')
             ->selectRaw('round(sum(total_apre) - sum(total_act)) AS retirado')
             ->where('id_coor', 5)
             ->get();
         $retencion = Ficha::selectRaw('round(sum(total_act)*100 / sum(total_apre)) AS total')
             ->where('id_coor', 5)
             ->get();
         $desercion = Ficha::selectRaw('round(100-(sum(total_act)*100 / sum(total_apre))) AS total')
             ->where('id_coor', 5)
             ->get();



         $reporteHui = Ficha::selectRaw('id, nivel, total_apre - total_act AS registro_coordinacion, total_act AS suma_total_act, round((total_act  / total_apre)*100) AS totald, round(100-((total_act * 100) / total_apre)) AS totalr')
             ->where('id_coor', 5)
             ->orderByDesc('registro_coordinacion')
             ->get();
             $request->user()->authorizeRoles([ 'hui']);
         return view('Coordinadores.hui.reporte', compact('reporteHui', 'apre', 'act', 'retirados', 'retencion', 'desercion'));
     }


     #6
     public function joseCoordinador(Request $request)
     {

         $datosJose = Ficha::selectRaw('id, id_coor, nivel, estado, fecha_in, fecha_fin, total_apre, total_act ')
             ->where('id_coor', 6)
             ->orderBy('total_apre')
             ->get();
             $request->user()->authorizeRoles([ 'jose']);
         return view('Coordinadores.jose.ficha', compact('datosJose'));
     }

     public function repoJose(Request $request)
     {
            $niveles = Ficha::selectRaw('nivel, sum(total_apre) as total_matriculados, sum(total_act) as total_activos, (sum(total_apre) - sum(total_act)) as total_desertados, round(sum(total_act)*100 / sum(total_apre)) AS total_retencion, round(100-(sum(total_act)*100 / sum(total_apre))) AS total_desercion')
             ->where('id_coor', 6)
             ->groupBy('nivel')
             ->get();
             $request->user()->authorizeRoles([ 'jose']);

         return view('Coordinadores.jose.niveles', compact('niveles'));
     }


     public function reporteJose(Request $request)
     {

         $buscarporC = $request->get('buscarporC');


         $apre = Ficha::selectRaw('SUM(total_apre) as total')
             ->where('id_coor', 6)
             ->get();

         $act = Ficha::selectRaw('SUM(total_act) as total')
             ->where('id_coor', 6)
             ->get();

         $retirados = DB::table('fichas')
             ->selectRaw('round(sum(total_apre) - sum(total_act)) AS retirado')
             ->where('id_coor', 6)
             ->get();
         $retencion = Ficha::selectRaw('round(sum(total_act)*100 / sum(total_apre)) AS total')
             ->where('id_coor', 6)
             ->get();
         $desercion = Ficha::selectRaw('round(100-(sum(total_act)*100 / sum(total_apre))) AS total')
             ->where('id_coor', 6)
             ->get();



         $reporteJose = Ficha::selectRaw('id, nivel, total_apre - total_act AS registro_coordinacion, total_act AS suma_total_act, round((total_act  / total_apre)*100) AS totald, round(100-((total_act * 100) / total_apre)) AS totalr')
             ->where('id_coor', 6)
             ->orderByDesc('registro_coordinacion')
             ->get();
             $request->user()->authorizeRoles([ 'jose']);
         return view('Coordinadores.jose.reporte', compact('reporteJose', 'apre', 'act', 'retirados', 'retencion', 'desercion'));
     }


     #7
     public function manuelCoordinador(Request $request)
     {

         $datosManuel = Ficha::selectRaw('id, id_coor, nivel, estado, fecha_in, fecha_fin, total_apre, total_act ')
             ->where('id_coor', 7)
             ->orderBy('total_apre')
             ->get();
             $request->user()->authorizeRoles([ 'manuel']);
         return view('Coordinadores.manuel.ficha', compact('datosManuel'));
     }

     public function repoManuel(Request $request)
     {
            $niveles = Ficha::selectRaw('nivel, sum(total_apre) as total_matriculados, sum(total_act) as total_activos, (sum(total_apre) - sum(total_act)) as total_desertados, round(sum(total_act)*100 / sum(total_apre)) AS total_retencion, round(100-(sum(total_act)*100 / sum(total_apre))) AS total_desercion')
             ->where('id_coor', 7)
             ->groupBy('nivel')
             ->get();
             $request->user()->authorizeRoles([ 'manuel']);

         return view('Coordinadores.manuel.niveles', compact('niveles'));
     }


     public function reporteManuel(Request $request)
     {

         $buscarporC = $request->get('buscarporC');


         $apre = Ficha::selectRaw('SUM(total_apre) as total')
             ->where('id_coor', 7)
             ->get();

         $act = Ficha::selectRaw('SUM(total_act) as total')
             ->where('id_coor', 7)
             ->get();

         $retirados = DB::table('fichas')
             ->selectRaw('round(sum(total_apre) - sum(total_act)) AS retirado')
             ->where('id_coor', 7)
             ->get();
         $retencion = Ficha::selectRaw('round(sum(total_act)*100 / sum(total_apre)) AS total')
             ->where('id_coor', 7)
             ->get();
         $desercion = Ficha::selectRaw('round(100-(sum(total_act)*100 / sum(total_apre))) AS total')
             ->where('id_coor', 7)
             ->get();



         $reporteManuel = Ficha::selectRaw('id, nivel, total_apre - total_act AS registro_coordinacion, total_act AS suma_total_act, round((total_act  / total_apre)*100) AS totald, round(100-((total_act * 100) / total_apre)) AS totalr')
             ->where('id_coor', 7)
             ->orderByDesc('registro_coordinacion')
             ->get();
             $request->user()->authorizeRoles([ 'manuel']);
         return view('Coordinadores.manuel.reporte', compact('reporteManuel', 'apre', 'act', 'retirados', 'retencion', 'desercion'));
     }


     #8
     public function olgaCoordinador(Request $request)
     {

         $datosOlga = Ficha::selectRaw('id, id_coor, nivel, estado, fecha_in, fecha_fin, total_apre, total_act ')
             ->where('id_coor', 8)
             ->orderBy('total_apre')
             ->get();
             $request->user()->authorizeRoles([ 'olga']);
         return view('Coordinadores.olga.ficha', compact('datosOlga'));
     }

     public function repoOlga(Request $request)
     {
            $niveles = Ficha::selectRaw('nivel, sum(total_apre) as total_matriculados, sum(total_act) as total_activos, (sum(total_apre) - sum(total_act)) as total_desertados, round(sum(total_act)*100 / sum(total_apre)) AS total_retencion, round(100-(sum(total_act)*100 / sum(total_apre))) AS total_desercion')
             ->where('id_coor', 8)
             ->groupBy('nivel')
             ->get();
             $request->user()->authorizeRoles([ 'olga']);

         return view('Coordinadores.olga.niveles', compact('niveles'));
     }


     public function reporteOlga(Request $request)
     {

         $buscarporC = $request->get('buscarporC');


         $apre = Ficha::selectRaw('SUM(total_apre) as total')
             ->where('id_coor', 8)
             ->get();

         $act = Ficha::selectRaw('SUM(total_act) as total')
             ->where('id_coor', 8)
             ->get();

         $retirados = DB::table('fichas')
             ->selectRaw('round(sum(total_apre) - sum(total_act)) AS retirado')
             ->where('id_coor', 8)
             ->get();
         $retencion = Ficha::selectRaw('round(sum(total_act)*100 / sum(total_apre)) AS total')
             ->where('id_coor', 8)
             ->get();
         $desercion = Ficha::selectRaw('round(100-(sum(total_act)*100 / sum(total_apre))) AS total')
             ->where('id_coor', 8)
             ->get();



         $reporteOlga = Ficha::selectRaw('id, nivel, total_apre - total_act AS registro_coordinacion, total_act AS suma_total_act, round((total_act  / total_apre)*100) AS totald, round(100-((total_act * 100) / total_apre)) AS totalr')
             ->where('id_coor', 8)
             ->orderByDesc('registro_coordinacion')
             ->get();
             $request->user()->authorizeRoles([ 'olga']);
         return view('Coordinadores.olga.reporte', compact('reporteOlga', 'apre', 'act', 'retirados', 'retencion', 'desercion'));
     }


     #9
     public function robertoCoordinador(Request $request)
     {

         $datosRoberto = Ficha::selectRaw('id, id_coor, nivel, estado, fecha_in, fecha_fin, total_apre, total_act ')
             ->where('id_coor', 9)
             ->orderBy('total_apre')
             ->get();
             $request->user()->authorizeRoles([ 'roberto']);
         return view('Coordinadores.roberto.ficha', compact('datosRoberto'));
     }

     public function repoRoberto(Request $request)
     {
            $niveles = Ficha::selectRaw('nivel, sum(total_apre) as total_matriculados, sum(total_act) as total_activos, (sum(total_apre) - sum(total_act)) as total_desertados, round(sum(total_act)*100 / sum(total_apre)) AS total_retencion, round(100-(sum(total_act)*100 / sum(total_apre))) AS total_desercion')
             ->where('id_coor', 9)
             ->groupBy('nivel')
             ->get();
             $request->user()->authorizeRoles([ 'roberto']);

         return view('Coordinadores.roberto.niveles', compact('niveles'));
     }


     public function reporteRoberto(Request $request)
     {

         $buscarporC = $request->get('buscarporC');


         $apre = Ficha::selectRaw('SUM(total_apre) as total')
             ->where('id_coor', 9)
             ->get();

         $act = Ficha::selectRaw('SUM(total_act) as total')
             ->where('id_coor', 9)
             ->get();

         $retirados = DB::table('fichas')
             ->selectRaw('round(sum(total_apre) - sum(total_act)) AS retirado')
             ->where('id_coor', 9)
             ->get();
         $retencion = Ficha::selectRaw('round(sum(total_act)*100 / sum(total_apre)) AS total')
             ->where('id_coor', 9)
             ->get();
         $desercion = Ficha::selectRaw('round(100-(sum(total_act)*100 / sum(total_apre))) AS total')
             ->where('id_coor',9)
             ->get();



         $reporteRoberto = Ficha::selectRaw('id, nivel, total_apre - total_act AS registro_coordinacion, total_act AS suma_total_act, round((total_act  / total_apre)*100) AS totald, round(100-((total_act * 100) / total_apre)) AS totalr')
             ->where('id_coor', 9)
             ->orderByDesc('registro_coordinacion')
             ->get();
             $request->user()->authorizeRoles([ 'roberto']);
         return view('Coordinadores.roberto.reporte', compact('reporteRoberto', 'apre', 'act', 'retirados', 'retencion', 'desercion'));
     }


}
