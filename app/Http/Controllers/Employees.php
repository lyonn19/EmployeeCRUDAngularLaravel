<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;

class Employees extends Controller
{
    public function index($id = null) {
        if ($id == null) {
            return Employee::orderBy('fechaingreso', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    public function store(Request $request) {

        $employee = new Employee;
        $employee->fechaingreso = $request->input('fechaingreso');
        $employee->documentoident = $request->input('documentoident');
        $employee->nombrepersona     = $request->input('nombrepersona');
        $employee->apellidopersona = $request->input('apellidopersona');
        $employee->telefonoprincipalpersona = $request->input('telefonoprincipalpersona ');
        $employee->telefonosecundariopersona = $request->input('telefonosecundariopersona');
        $employee->celularpersona = $request->input('celularpersona');
        $employee->direccionperona= $request->input('direccionperona');
        $employee->correopersona = $request->input('correopersona');
        $employee->fotoempleado  = $request->input('fotoempleado');
        $employee->idcargo = $request->input('idcargo');

        //Salvar el cargo
        $employee->save();
        return 'Employee record successfully created with id ' . $employee->documentoident;
    }

    public function show($id) {
        return Employee::find($id);
    }

    public function update(Request $request, $id) {

        $employee = Employee::find($id);
        $employee->fechaingreso = $request->input('fechaingreso');
        $employee->documentoident = $request->input('documentoident');
        $employee->nombrepersona     = $request->input('nombrepersona');
        $employee->apellidopersona = $request->input('apellidopersona');
        $employee->telefonoprincipalpersona = $request->input('telefonoprincipalpersona ');
        $employee->telefonosecundariopersona = $request->input('telefonosecundariopersona');
        $employee->celularpersona = $request->input('celularpersona');
        $employee->direccionperona= $request->input('direccionperona');
        $employee->correopersona = $request->input('correopersona');
        $employee->fotoempleado  = $request->input('fotoempleado');
        $employee->idcargo = $request->input('idcargo');
        $employee->save();
        return "Sucess updating user #" . $employee->documentoident;
    }

    public function destroy(Request $request) {
        $employee = Employee::find($request->input('documentoident'));
        $employee->delete();
        return "Employee record successfully deleted #" . $request->input('documentoident');
    }
}
