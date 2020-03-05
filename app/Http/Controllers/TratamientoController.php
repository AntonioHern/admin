<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Tratamiento;
use Illuminate\Http\Request;

class TratamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $dni
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {

        $dni=$request->dni;
        return view('tratamientos.create', ['paciente' => Paciente::findOrFail($dni)]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tratamiento= new Tratamiento();
        $tratamiento->paciente=$request->paciente;
        $tratamiento->nMedicina=$request->nMedicina;
        $tratamiento->dosis=$request->dosis;
        $tratamiento->cada=$request->cada;
        $tratamiento->stock=$request->stock;
        $tratamiento->save();

        $dni=$request->paciente;
        return view('pacientes.show', ['paciente'=>Paciente::findOrFail($dni),
            ]);
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
