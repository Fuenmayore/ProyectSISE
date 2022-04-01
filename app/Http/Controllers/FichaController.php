<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\FichaImport;
use App\Exports\FichaExport;
use App\Exports\FichaCEExport;
use App\Exports\FichaTecExport;
use App\Exports\FichaTecnExport;
use App\Exports\FichaEsExport;
use App\Exports\FichaEvExport;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;



class FichaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        $buscarpor=$request->get('buscarpor');

        $datos['fichas']=Ficha::
        where('id', 'like','%'.$buscarpor.'%')
        ->orwhere('nivel', 'like','%'.$buscarpor.'%')
        ->orwhere('estado', 'like','%'.$buscarpor.'%')
        ->paginate(15);
        $request->user()->authorizeRoles([ 'admin']);  
        return view('ficha.index', $datos,compact( 'buscarpor'));

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
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function show(Ficha $ficha)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function edit(Ficha $ficha)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ficha $ficha)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ficha  $ficha
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ficha $ficha)
    {
        //
    }

    public function fileImportExportFicha()
    {

        $datos['fichas'] = Ficha::paginate(300);
        return view('ficha.index', $datos);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImportFicha(Request $request)
    {

        Excel::import(new FichaImport, $request->file('file')->store('temp'));
        return back();
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileExportFicha()
    {
        return Excel::download(new FichaExport, 'ficha-collection.xlsx');
    }

    public function fileExportCE()
    {
        return Excel::download(new FichaCEExport, 'fichaCE-collection.xlsx');
    }

    public function fileExportTec()
    {
        return Excel::download(new FichaTecExport, 'fichaTec-collection.xlsx');
    }
    public function fileExportTecn()
    {
        return Excel::download(new FichaTecnExport, 'fichaTecn-collection.xlsx');
    }
    public function fileExportEs()
    {
        return Excel::download(new FichaEsExport, 'fichaEs-collection.xlsx');
    }
    public function fileExportEv()
    {
        return Excel::download(new FichaEvExport, 'fichaEv-collection.xlsx');
    }
}
