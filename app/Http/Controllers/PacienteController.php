<?php

namespace App\Http\Controllers;

use App\Http\Requests\PacienteFormRequest;
use App\Paciente;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PacienteController extends Controller
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
        if($request){
            $query=trim($request->get('search'));
            $pacientes=Paciente::where('nombre','LIKE','%'.$query.'%')
                ->orderBy('nombre','asc')
                ->simplePaginate(6);
            return view('pacientes.index',['pacientes'=>$pacientes,'search'=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PacienteFormRequest $request)
    {

        $nFoto="";
        if($request->hasFile('foto')){
            $foto=$request->file('foto');
            $nFoto=time().$foto->getClientOriginalName();
            $foto->move(public_path().'/imagenes/',$nFoto);
        }

        $paciente= new Paciente();
        $paciente->dni=$request->dni;
        $paciente->nombre = $request->nombre;
        $paciente->apellido1 = $request->apellido1;
        $paciente->apellido2 = $request->apellido2;
        $paciente->foto=$nFoto;
        $paciente->fNacimiento= $request->fNacimiento;
        $paciente->telefono=str_replace(' ','',$request->telefono);
        $paciente->save();
        Alert::success('Paciente Creado!', 'El paciente '.$paciente->nombre.' ha sido creado con éxito');
        return redirect('/pacientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  var  $dni
     * @return \Illuminate\Http\Response
     */
    public function show($dni)
    {
        return view('pacientes.show', ['paciente' => Paciente::findOrFail($dni)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  var  $dni
     * @return \Illuminate\Http\Response
     */
    public function edit($dni)
    {
        return view('pacientes.edit', ['paciente' => Paciente::findOrFail($dni)]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  var  $dni
     * @return \Illuminate\Http\Response
     */
    public function update(PacienteFormRequest $request, $dni)
    {
        $nFoto="";
        if($request->hasFile('foto')){
            $foto=$request->file('foto');
            $nFoto=time().$foto->getClientOriginalName();
            $foto->move(public_path().'/imagenes/',$nFoto);
        }

        $paciente= Paciente::findOrFail($dni);
        $paciente->dni=$request->dni;
        $paciente->nombre = $request->nombre;
        $paciente->apellido1 = $request->apellido1;
        $paciente->apellido2 = $request->apellido2;
        $paciente->foto=$nFoto;
        $paciente->fNacimiento= $request->fNacimiento;
        $paciente->telefono=str_replace(' ','',$request->telefono);
        Alert::success('Paciente Actualizado!', 'El paciente '.$paciente->nombre.' ha sido actualizado con éxito');
        $paciente->save();

        return redirect('/pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  var  $dni
     * @return \Illuminate\Http\Response
     */
    public function destroy($dni)
    {
        $paciente= Paciente::findOrFail($dni);
        $paciente->delete();
        return redirect('/pacientes');
    }


}
