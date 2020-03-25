<?php

namespace App\Http\Controllers;

use App\Http\Requests\MensajeFormRequest;
use App\Mensaje;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usuarios=User::where('id','!=',auth()->id())->get();
        return view('home',['usuarios'=>$usuarios]);
    }
    public function store(MensajeFormRequest $request)
    {
        Mensaje::create([
                'enviador_id'=>auth()->id(),
                'receptor_id'=>$request->receptor_id,
                'asunto'=>$request->asunto,
                'cuerpo'=>$request->cuerpo,
        ]);
        Alert::toast('Mensaje enviado', 'success')->position('top-right')
            ->autoClose(5000)
            ->background('#5cb85c')
            ->hideCloseButton();
        return back();
    }



}
