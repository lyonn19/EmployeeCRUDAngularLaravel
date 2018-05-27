<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database;
use App\Http\Requests;
use DB;

class Cargos extends Controller
{
    //
    public function index($id = null) {
        if ($id == null) {
            return Cargo::all();
        } else {
            return $this->show($id);
        }
    }

    public function sequence()
    {
        $next_id = DB::select("select nextval('sequence_for_alpha_numeric')");
        $cod_pref = $next_id['0']->nextval > 9 ? "COD" : "COD0";
        $result = $cod_pref .strval($next_id['0']->nextval);

        return $result;
    }

    public function store(Request $request) {
        $cargo = new Cargo();
        $cargo->idcargo= $request->input('idcargo');
        $cargo->nombrecargo = $request->input('nombrecargo');
        $cargo->save();

        return 'Cargo creado con id ' . $cargo->idcargo;
    }

    public function show($id) {
        //return Cargo::find($id);
        return Cargo::where('idcargo', $id)->first();


    }

    public function update(Request $request, $id) {
        //$cargo = Cargo::find($id);
        $cargo = Cargo::where('idcargo', $id)->first();
        $cargo->idcargo= $request->input('idcargo');
        $cargo->nombrecargo = $request->input('nombrecargo');
        $cargo->save();
        return "Cargo actualizado correctamente #" . $cargo->idcargo;
    }

    public function destroy($id) {

        Cargo::where('idcargo',$id)->delete();
        return "Cargo eliminado correctamente con id #" . $id;
    }

}
