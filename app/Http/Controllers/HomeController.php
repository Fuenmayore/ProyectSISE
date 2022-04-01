<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('soloadmin',['only'=>'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        $request->user()->authorizeRoles([ 'admin']);
        return view('home');
    }

    public function cesar(Request $request){
        $request->user()->authorizeRoles([ 'cesar']);
    return view('Coordinadores.cesarC.homecesar');}

    public function adriana(Request $request){
        $request->user()->authorizeRoles([ 'adriana']);
    return view('Coordinadores.adriana.homeadriana');}

    public function aldo(Request $request){
        $request->user()->authorizeRoles([ 'aldo']);
    return view('Coordinadores.aldo.homealdo');}

    public function elkin(Request $request){
        $request->user()->authorizeRoles([ 'elkin']);
    return view('Coordinadores.elkin.homeelkin');}

    public function hui(Request $request){
        $request->user()->authorizeRoles([ 'hui']);
    return view('Coordinadores.hui.homehui');}

    public function jose(Request $request){
        $request->user()->authorizeRoles([ 'jose']);
    return view('Coordinadores.jose.homejose');}

    public function manuel(Request $request){
        $request->user()->authorizeRoles([ 'manuel']);
    return view('Coordinadores.manuel.homemanuel');}

    public function olga(Request $request){
        $request->user()->authorizeRoles([ 'olga']);
    return view('Coordinadores.olga.homeolga');}

    public function roberto(Request $request){
        $request->user()->authorizeRoles([ 'roberto']);
    return view('Coordinadores.roberto.homeroberto');}

    public function usuario(Request $request){
        $request->user()->authorizeRoles([ 'user']);
        return view('Usuario');}
}
