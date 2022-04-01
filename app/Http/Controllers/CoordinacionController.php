<?php

namespace App\Http\Controllers;

use App\Models\Coordinacion;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CoordinacionImport;
use App\Exports\CoordinacionExport;

class CoordinacionController extends Controller
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
    public function index()
    {
        $datos['coordinacions']=Coordinacion::paginate(40);
     
        return view('coordinacion.index',$datos);
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
     * @param  \App\Models\Coordinacion  $coordinacion
     * @return \Illuminate\Http\Response
     */
    public function show(Coordinacion $coordinacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coordinacion  $coordinacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Coordinacion $coordinacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coordinacion  $coordinacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coordinacion $coordinacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coordinacion  $coordinacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coordinacion $coordinacion)
    {
        //
    }

    public function fileImportExportCoordinacion(Request $request)
    {
        $datos['coordinacions']=Coordinacion::paginate(40);
        $request->user()->authorizeRoles([ 'admin']);  
        return view('coordinacion.index',$datos);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportCoordinacion(Request $request)
    {
        Excel::import(new CoordinacionImport, $request->file('file')->store('temp'));
        return back();
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExportcoordinacion()
    {
        return Excel::download(new CoordinacionExport, 'coordinacion-collection.xlsx');
    }
}
