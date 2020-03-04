<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\User;
use Illuminate\Http\Request;


class UserController extends Controller
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
                $users=User::where('name','LIKE','%'.$query.'%')
                    ->orderBy('id','asc')
                    ->simplePaginate(7);
                return view('usuarios.index',['users'=>$users,'search'=>$query]);
            }
        //$users=User::all();
        //return view('usuarios.index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $nFoto="";
        if($request->hasFile('foto')){
            $foto=$request->file('foto');
            $nFoto=time().$foto->getClientOriginalName();
            $foto->move(public_path().'/imagenes/',$nFoto);
        }

        $usuario= new User();
        $usuario->name = $request->name;
        $usuario->apellido1 = $request->apellido1;
        $usuario->apellido2 = $request->apellido2;
        $usuario->foto=$nFoto;
        $usuario->email= $request->email;
        $usuario->password=bcrypt($request->password);



        $usuario->save();

        return redirect('/usuarios');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('usuarios.show', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('usuarios.edit', ['user' => User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)

    {
        $nFoto="";
        if($request->hasFile('foto')){
            $foto=$request->file('foto');
            $nFoto=time().$foto->getClientOriginalName();
            $foto->move(public_path().'/imagenes/',$nFoto);
        }
        $usuario=  User::findOrFail($id);
        $usuario->name = $request->get('name');
        $usuario->apellido1 = $request->get('apellido1');
        $usuario->apellido2 = $request->get('apellido2');
        $usuario->email = $request->get('email');
        $usuario->password= $request->get('password');
        $usuario->foto=$nFoto;

        $usuario->update();
        return redirect('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario= User::findOrFail($id);
        $usuario->delete();
        return redirect('/usuarios');

    }
}
