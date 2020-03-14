<?php

namespace App\Http\Controllers;

use App\Paciente;
use App\Tratamiento;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TratamientoController extends Controller
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param var $dni
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {

        $dni = $request->dni;
        return view('tratamientos.create', ['paciente' => Paciente::findOrFail($dni)]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tratamiento = new Tratamiento();
        $tratamiento->paciente = $request->get('paciente');
        $tratamiento->nMedicina = $request->get('nMedicina');
        $tratamiento->dosis = $request->get('dosis');
        $tratamiento->cada = $request->get('cada');
        $tratamiento->stock = $request->get('stock');
        $tratamiento->save();

        $dni = $request->paciente;
        return view('pacientes.show', ['paciente' => Paciente::findOrFail($dni),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('tratamientos.edit', ['tratamiento' => Tratamiento::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        $tratamiento->paciente = $request->get('paciente');
        $tratamiento->nMedicina = $request->get('nMedicina');
        $tratamiento->dosis = $request->get('dosis');
        $tratamiento->cada = $request->get('cada');
        $tratamiento->stock = $request->get('stock');
        $tratamiento->update();
        $paciente = $tratamiento->paciente;
        return redirect('/pacientes/' . $paciente);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tratamiento = Tratamiento::findOrFail($id);
        $paciente = $tratamiento->paciente;
        $tratamiento->delete();
        return redirect('/pacientes/' . $paciente);
    }

    public function listarStock(Request $request)
    {
        if ($request) {
            $query = trim($request->get('search'));
            $tratamientos = DB::table('tratamientos')
                ->select('nMedicina', DB::raw('SUM(stock) as stock'))
                ->where('nMedicina', 'LIKE', '%' . $query . '%')
                ->groupBy('nMedicina')
                ->orderBy('nMedicina')
                ->get();
            $encabezado='Listado de stock de medicinas';
            return view('tratamientos.index', ['tratamientos' => $tratamientos, 'search' => $query,
                'encabezado'=>$encabezado
                ]);

        }
    }

    public function stockBajo(Request $request)
    {
        if ($request) {
            $query = trim($request->get('search'));
            $tratamientos = DB::table('tratamientos')
                ->select('nMedicina', DB::raw('SUM(stock) as stock'))
                ->where('nMedicina', 'LIKE', '%' . $query . '%')
                ->groupBy('nMedicina')
                ->having('stock', '<', 11)
                ->orderBy('nMedicina')
                ->get();
            $encabezado='Stock de medicinas bajo';
            return view('tratamientos.index', ['tratamientos' => $tratamientos, 'search' => $query,
                'encabezado'=>$encabezado
                ]);
        }
    }

    public function ultimosTratamientos(Request $request){
        if ($request) {
            $query = trim($request->get('search'));
            $tratamientos = DB::table('tratamientos')
                ->select('*')
                ->where('nMedicina', 'LIKE', '%' . $query . '%')
                ->orderBy('created_at','desc')
                ->take(2)
                ->get();
            $encabezado='Últimos tratamientos';
            return view('tratamientos.index', ['tratamientos' => $tratamientos, 'search' => $query,
                'encabezado'=>$encabezado
                ]);
        }
    }

    public function recetas()
    {

    $lista=DB::table('tratamientos')
        ->join('pacientes','pacientes.dni','=','tratamientos.paciente')
        ->select('tratamientos.nMedicina', 'tratamientos.stock','pacientes.nombre as nombrePaciente',
            'pacientes.apellido1 as primerApellido', 'pacientes.apellido2 as segundoApellido')
        ->where('tratamientos.stock','<',10)
        ->orderBy('tratamientos.stock','asc')
        ->get();
    //dd($tratamiento);
        for ($i=0;$i<count($lista);$i++) {
            $name['paciente'][$i]= $lista[$i]->nombrePaciente;
            $name['apellido1'][$i] = $lista[$i]->primerApellido;
            $name['apellido2'][$i] = $lista[$i]->segundoApellido;
            $name['medicina'][$i]= $lista[$i]->nMedicina;
            $name['stock'][$i] = $lista[$i]->stock;
        }

        Mail::send('emails.test',$name,function ($mensaje) {
            $mensaje->to('pcayudan@gmail.com', 'Enfermera')->subject('Recetas');
        });
        return view('emails.enviado');




    }

}
