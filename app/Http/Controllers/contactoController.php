<?php

namespace App\Http\Controllers;

use App\Models\becas;
use App\Models\carreras;
use App\Models\concepto_pagos;
use App\Models\contactos;
use App\Models\matriculas;
use App\Models\modalidades;
use App\Models\planteles;
use App\Models\usuarios;
use Illuminate\Http\Request;

class contactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = contactos::all();
        // echo $contactos;

        // echo $contactos->planteles[0]->nom_plantel;
        // $carreras=carreras::all();$usuarios=usuarios::all();$modalidades=modalidades::all();$planteles=planteles::all();$becas=becas::all();$concepto_pagos=concepto_pagos::all();$matriculas=matriculas::all();
        return view('contacto/index', compact('contactos'),['carreras'=>carreras::all(),'usuarios'=>usuarios::all(),'modalidad'=>modalidades::all(),'planteles'=>planteles::all(),'becas'=>becas::all()]);
        // echo $usuarios[0];
        // echo $contactos[0];
        // echo $ccarreras[0];
        // echo $modalidades[0];
        // echo $planteles[0]->nom_plantel;
        // echo $becas[0];
        // echo $concepto_pagos[0];
        // echo $matriculas[0];
        
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
     * @param  \App\Models\contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function show(contactos $contactos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function edit( $id_contacto )
    {
        // echo $id_contacto;
        $usuario=usuarios::all();
        $plantel=planteles::all();
        $carrera=carreras::all();
        $modalidad=modalidades::all();
        $beca=becas::all();
        // $vehiculo = vehiculos::find($id_vehiculo);
        $contacto=contactos::find($id_contacto);


        return view('contacto.edit', compact('contacto', $contacto, 'usuario', $usuario, 'plantel', $plantel, 'carrera', $carrera, 'modalidad',$modalidad, 'beca',$beca));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id_contacto)
    {
        $request->validate([
            
            // 'txtnombre1' => 'required|max:50',
            // 'txt_apellido_p' => 'required|max:50',
            // 'txt_apellido_m' => 'required|max:50',
            // 'txt_carrera' => 'required',
            // 'txt_modalidad' => 'required',
            // 'txt_beca1' => 'required',

            'txtcorreo1'=>'required|max:40',
            'txtpassword1'=>'required|max:18',
            'numero_celular'=>'required|max:10',
            'numero_telefono'=>'required|max:10',
            'txt_plantel1'=>'required',


        ]); //validador de los campos 

        // $usuario = usuarios::find($id_usuario);

        // $usuario->nom_usuario = $request->get('txtnombre1');
        // $usuario->apellido_paterno = $request->get('txt_apellido_p');
        // $usuario->apellido_materno = $request->get('txt_apellido_m');
        // $usuario->fk_carrera = $request->get('txt_carrera');
        // $usuario->fk_modalidad = $request->get('txt_modalidad');
        // $usuario->fk_beca = $request->get('txt_beca1');

        // $usuario->save();

        $contacto = contactos::find($id_contacto);

        $contacto -> correo = $request ->get('txtcorreo1');
        $contacto -> password = $request ->get('txtpassword1');
        $contacto -> num_celular = $request ->get('numero_celular');
        $contacto -> num_telefono = $request ->get('numero_telefono');
        $contacto -> fk_plantel = $request ->get('txt_plantel1');
        $contacto -> fk_usuario = $request ->get('id_usuario');

        $contacto->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function destroy(contactos $contactos)
    {
        //
    }
}
