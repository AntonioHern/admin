<?php

namespace App\Http\Controllers;
use App\Mensaje;
use App\User;
use Illuminate\Http\Request;

class MensajeController extends Controller
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
        $mensajes=Mensaje::where('receptor_id','=',auth()->id())->get();
        $usuarios=User::where('id','!=',auth()->id())->get();
        return view('mensajes.index',['mensajes'=>$mensajes,
            'usuarios'=>$usuarios,
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensaje=Mensaje::findOrFail($id);
        $idUsuario=$mensaje->enviador_id;
        $usuario=User::findOrFail($idUsuario);
        return view('mensajes.show',[
            'mensaje'=>$mensaje,
            'usuario'=>$usuario
        ]);

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
        $mensaje= Mensaje::findOrFail($id);
        $mensaje->delete();
        return redirect('/mensajes');
    }
}
