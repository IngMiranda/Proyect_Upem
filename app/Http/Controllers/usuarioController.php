<?php

namespace App\Http\Controllers;

use App\Models\becas;
use App\Models\carreras;
use App\Models\modalidades;
use App\Models\usuarios;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = usuarios::all();

        return view('usuario/index', compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuario.create', ['usuarios' => usuarios::all(), 'carreras'=>carreras::all(), 'modalidades'=>modalidades::all(), 'becas'=>becas::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'txtnombre1' => 'required|max:50',
            'txt_apellido_p' => 'required|max:50',
            'txt_apellido_m' => 'required|max:50',
            'txt_carrera' => 'required',
            'txt_modalidad' => 'required',
            'txt_beca1' => 'required',

        ]);

        $usuario = new usuarios();

        $usuario->nom_usuario = $request->get('txtnombre1');
        $usuario->apellido_paterno = $request->get('txt_apellido_p');
        $usuario->apellido_materno = $request->get('txt_apellido_m');
        $usuario->fk_carrera = $request->get('txt_carrera');
        $usuario->fk_modalidad = $request->get('txt_modalidad');
        $usuario->fk_beca = $request->get('txt_beca1');

        $usuario->save();
        $id_usuario=$usuario['id'];
        echo $id_usuario;
        // $lastInsertId = $usuario->id_usuario;
        // echo $lastInsertId;
   
        return redirect('usuario/index');
        //$usuario = usuarios::latest('id_usuario')->first();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit(usuarios $usuarios)
    {
        $usuario=usuarios::all();
        

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id_usuario)
    {
        $request->validate([
            
            'txtnombre1' => 'required|max:50',
            'txt_apellido_p' => 'required|max:50',
            'txt_apellido_m' => 'required|max:50',
            'txt_carrera' => 'required',
            'txt_modalidad' => 'required',
            'txt_beca1' => 'required',

        ]);

        $usuario = usuarios::find($id_usuario);

        $usuario->nom_usuario = $request->get('txtnombre1');
        $usuario->apellido_paterno = $request->get('txt_apellido_p');
        $usuario->apellido_materno = $request->get('txt_apellido_m');
        $usuario->fk_carrera = $request->get('txt_carrera');
        $usuario->fk_modalidad = $request->get('txt_modalidad');
        $usuario->fk_beca = $request->get('txt_beca1');

        $usuario->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(usuarios $usuarios)
    {
        //
    }
}
