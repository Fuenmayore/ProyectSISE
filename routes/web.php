<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\CoordinacionController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\CoordinadoresController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* Route::get('nivel', function () {
    return view('ficha.nivel');
}); */

/* consulta */
Route::get('consulta', [ConsultaController::class,'index'])->name('consulta');
Route::get('modal', [ConsultaController::class,'buscar'])->name('modal');
Route::get('BI', [ConsultaController::class,'BI'])->name('BI');


/* centro */
Route::get('centro', [CentroController::class, 'fileImportExportCentro'])->name('centro');
Route::post('file-import-centro', [CentroController::class, 'fileImportCentro'])->name('file-import-centro');
Route::get('file-export-centro', [CentroController::class, 'fileExportCentro'])->name('file-export-centro');

/* coordinacion */
Route::get('coordinacion', [CoordinacionController::class, 'fileImportExportCoordinacion'])->name('coordinacion');
Route::post('file-import-coordinacion', [CoordinacionController::class, 'fileImportCoordinacion'])->name('file-import-coordinacion');
Route::get('file-export-coordinacion', [CoordinacionController::class, 'fileExportCoordinacion'])->name('file-export-coordinacion');

/* ficha */
Route::get('ficha', [FichaController::class, 'index'])->name('ficha');
Route::post('file-import-ficha', [FichaController::class, 'fileImportFicha'])->name('file-import-ficha');
Route::get('file-export-ficha', [FichaController::class, 'fileExportFicha'])->name('file-export-ficha');

/* CE */
Route::get('nivelCE', [ConsultaController::class,'nivelCE'])->name('nivelCE');
Route::get('fichaCE', [ConsultaController::class,'fichaCE'])->name('fichaCE');
Route::get('reporteCE', [ConsultaController::class,'reporteCE'])->name('reporteCE');
Route::get('file-export-fichaCE', [FichaController::class, 'fileExportCE'])->name('file-export-fichaCE');

/* Tecnico */
Route::get('nivelTec', [ConsultaController::class,'nivelTec'])->name('nivelTec');
Route::get('fichaTec', [ConsultaController::class,'fichaTec'])->name('fichaTec');
Route::get('reporteTec', [ConsultaController::class,'reporteTec'])->name('reporteTec');
Route::get('file-export-fichaTec', [FichaController::class, 'fileExportTec'])->name('file-export-fichaTec');

/* Tecnologo */
Route::get('nivelTecn', [ConsultaController::class,'nivelTecn'])->name('nivelTecn');
Route::get('reporteTecn', [ConsultaController::class,'reporteTecn'])->name('reporteTecn');
Route::get('fichaTecn', [ConsultaController::class,'fichaTecn'])->name('fichaTecn');
Route::get('file-export-fichaTecn', [FichaController::class, 'fileExportTecn'])->name('file-export-fichaTecn');

/* Espacializacion */
Route::get('nivelEs', [ConsultaController::class,'nivelEs'])->name('nivelEs');
Route::get('fichaEs', [ConsultaController::class,'fichaEs'])->name('fichaEs');
Route::get('reporteEs', [ConsultaController::class,'reporteEs'])->name('reporteEs');
Route::get('file-export-fichaEs', [FichaController::class, 'fileExportEs'])->name('file-export-fichaEs');

/* Evento */
Route::get('nivelEvento', [ConsultaController::class,'nivelEvento'])->name('nivelEvento');
Route::get('file-export-fichaEv', [FichaController::class, 'fileExportEv'])->name('file-export-fichaEv');
Route::get('reporteEvento', [ConsultaController::class,'reporteEvento'])->name('reporteEvento');
Route::get('fichaEvento', [ConsultaController::class,'fichaEvento'])->name('fichaEvento');

/* Coordinadores */

#Adriana
Route::get('coor_adriana', [CoordinadoresController::class, 'adrianaCoordinador'])->name('coor_adriana');
Route::get('reporte-adriana', [CoordinadoresController::class, 'reporteAdriana'])->name('reporte-adriana');
Route::get('reporte-nivelesAdriana', [CoordinadoresController::class, 'repoAdri'])->name('reporte-nivelesAdriana');

#Aldo
Route::get('coor_aldo', [CoordinadoresController::class, 'aldoCoordinador'])->name('coor_aldo');
Route::get('reporte-aldo', [CoordinadoresController::class, 'reporteAldo'])->name('reporte-aldo');
Route::get('reporte-nivelesAldo', [CoordinadoresController::class, 'repoAl'])->name('reporte-nivelesAldo');


#Cesar
Route::get('coor_cesar', [CoordinadoresController::class, 'cesarCoordinador'])->name('coor_cesar');
Route::get('reporte-cesar', [CoordinadoresController::class, 'reporteCesar'])->name('reporte-cesar');
Route::get('reporte-nivelesCesar', [CoordinadoresController::class, 'repoCE'])->name('reporte-nivelesCesar');

#Elkin
Route::get('coor_elkin', [CoordinadoresController::class, 'elkinCoordinador'])->name('coor_elkin');
Route::get('reporte-elkin', [CoordinadoresController::class, 'reporteElkin'])->name('reporte-elkin');
Route::get('reporte-nivelesElkin', [CoordinadoresController::class, 'repoElk'])->name('reporte-nivelesElkin');

#HUI
Route::get('coor_hui', [CoordinadoresController::class, 'huiCoordinador'])->name('coor_hui');
Route::get('reporte-hui', [CoordinadoresController::class, 'reporteHui'])->name('reporte-hui');
Route::get('reporte-nivelesHui', [CoordinadoresController::class, 'repoHui'])->name('reporte-nivelesHui');

#Jose
Route::get('coor_jose', [CoordinadoresController::class, 'joseCoordinador'])->name('coor_jose');
Route::get('reporte-jose', [CoordinadoresController::class, 'reporteJose'])->name('reporte-jose');
Route::get('reporte-nivelesJose', [CoordinadoresController::class, 'repoJose'])->name('reporte-nivelesJose');

#Manuel
Route::get('coor_manuel', [CoordinadoresController::class, 'manuelCoordinador'])->name('coor_manuel');
Route::get('reporte-manuel', [CoordinadoresController::class, 'reporteManuel'])->name('reporte-manuel');
Route::get('reporte-nivelesManuel', [CoordinadoresController::class, 'repoManuel'])->name('reporte-nivelesManuel');

#Olga
Route::get('coor_olga', [CoordinadoresController::class, 'olgaCoordinador'])->name('coor_olga');
Route::get('reporte-olga', [CoordinadoresController::class, 'reporteOlga'])->name('reporte-olga');
Route::get('reporte-nivelesOlga', [CoordinadoresController::class, 'repoOlga'])->name('reporte-nivelesOlga');

#Roberto
Route::get('coor_roberto', [CoordinadoresController::class, 'robertoCoordinador'])->name('coor_roberto');
Route::get('reporte-roberto', [CoordinadoresController::class, 'reporteRoberto'])->name('reporte-roberto');
Route::get('reporte-nivelesRoberto', [CoordinadoresController::class, 'repoRoberto'])->name('reporte-nivelesRoberto');
/* login */
Auth::routes();

/* Home */
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('homeCesar', [App\Http\Controllers\HomeController::class, 'cesar'])->name('homeCesar');
Route::get('homeAdriana', [App\Http\Controllers\HomeController::class, 'adriana'])->name('homeAdriana');
Route::get('homeAldo', [App\Http\Controllers\HomeController::class, 'aldo'])->name('homeAldo');
Route::get('homeElkin', [App\Http\Controllers\HomeController::class, 'elkin'])->name('homeElkin');
Route::get('homeHui', [App\Http\Controllers\HomeController::class, 'hui'])->name('homeHui');
Route::get('homeJose', [App\Http\Controllers\HomeController::class, 'jose'])->name('homeJose');
Route::get('homeManuel', [App\Http\Controllers\HomeController::class, 'manuel'])->name('homeManuel');
Route::get('homeOlga', [App\Http\Controllers\HomeController::class, 'olga'])->name('homeOlga');
Route::get('homeRoberto', [App\Http\Controllers\HomeController::class, 'roberto'])->name('homeRoberto');
Route::get('Usuario', [App\Http\Controllers\HomeController::class, 'usuario'])->name('Usuario');
