<?php

namespace App\Http\Controllers;

use App\Models\contactos;
use Illuminate\Http\Request;

use App\Models\becas;
use App\Models\carreras;
use App\Models\concepto_pagos;
use App\Models\modalidades;
use App\Models\planteles;
use App\Models\User;
use App\Models\usuarios;
// use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
// use Spatie\Permission\Traits\HasRoles;
use HasRoles;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use SebastianBergmann\CodeCoverage\StaticAnalysis\CacheWarmer;
use Spatie\Permission\Exceptions\RoleAlreadyExists;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

class contactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //     public function __construct()
    //     {
    //         $user=User::all();
    //         $this->middleware(['role:admin', 'permission:create users']);
    //         $user->hasRole('writer');
    // // $users= User::all();
    //         // $users->hasAnyRole(['writer', 'reader']);
    //     }
    public function index()
    {

        if (Auth::user()->id == auth()->user()->hasRole('writer')) {

            # code...
            $contactos_users = (Auth::user()->id);
            $usuario = usuarios::join("users", "usuarios.fk_users", "=", "users.id")
                ->where('users.id', $contactos_users)
                ->get();
            $contactos = contactos::all();


            return view(
                'contacto/usuarios_tabla',
                compact('contactos', 'contactos_users', 'usuario'),
                [
                    'carreras' => carreras::all(), 'contacto' => contactos::all(),
                    'modalidad' => modalidades::all(), 'planteles' => planteles::all(),
                    'becas' => becas::all()
                ]
            );
        } elseif (Auth::user()->id == auth()->user()->hasRole('admin')) {

            $contactos = contactos::all();

            return view('contacto/usuarios_tabla', compact('contactos'), [
                'user' => User::all(),
                'carreras' => carreras::all(), 'usuarios' => usuarios::all(),
                'modalidades' => modalidades::all(), 'planteles' => planteles::all(),
                'becas' => becas::all()
            ]);
        } else {
            return redirect('dashboard/');
        }

        /*
                creacion y asignacion de rol y permisos de usuario
                $role = Role::create(['name' => 'admin']);//creacion de rol
                $permission = Permission::create(['name' => 'create users']);//creacion del permiso

                //se asigna un permiso a un rol
                $role->givePermissionTo($permission);
                $permission->assignRole($role);

                //se le asigna al usuario el rol con el tipo de permiso
                $contactos_users->givePermissionTo('create users');
                $contactos_users->assignRole('admin');
                */

        /*
                creacion de rol y permisos para usuario solo vista

                $role = Role::create(['name' => 'reader']);//creacion de rol
                $permission = Permission::create(['name' => 'lector']);//creacion del permiso

                //se asigna un permiso a un rol
                $role->givePermissionTo($permission);
                            $permission->assignRole($role);

                            //se le asigna al usuario el rol con el tipo de permiso
                            $contactos_users->givePermissionTo('lector');
                            $contactos_users->assignRole('reader');
                            */

        /*
                            creacion de rol y permisos para usuario solo puede publicar

                            $role = Role::create(['name' => 'writer']);//creacion de rol
                            $permission = Permission::create(['name' => 'esccritor']);//creacion del permiso

                            //se asigna un permiso a un rol
                            $role->givePermissionTo($permission);
                            $permission->assignRole($role);

                            //se le asigna al usuario el rol con el tipo de permiso
                            $contactos_users->givePermissionTo('esccritor');
                            $contactos_users->assignRole('writer');
                            */
    }

    public function usuarios_tabla()
    {

        if (Auth::user()->id == auth()->user()->hasRole('writer')) {

            $contactos_users = (Auth::user()->id);
            $usuario = usuarios::join("users", "usuarios.fk_users", "=", "users.id")
                ->where('users.id', $contactos_users)
                // ->find('users.id', $login_user)
                ->get();
            $contactos = contactos::all();

            return view(
                'contacto/usuarios_tabla',
                compact('contactos', 'contactos_users', 'usuario'),
                [
                    'carreras' => carreras::all(), 'contacto' => contactos::all(),
                    'modalidad' => modalidades::all(), 'planteles' => planteles::all(),
                    'becas' => becas::all()
                ]
            );
        } elseif (Auth::user()->id == auth()->user()->hasRole('admin')) { //validacion de rol

            $contactos = contactos::all();

            return view('contacto/usuarios_tabla', compact('contactos'), [
                'user' => User::all(),
                'carreras' => carreras::all(), 'usuarios' => usuarios::all(),
                'modalidades' => modalidades::all(), 'planteles' => planteles::all(),
                'becas' => becas::all()
            ]);
        } else { //validacion de rol
            return redirect('dashboard/');
        }
    }

    public function upemref($id_contactos)
    {

        if (Auth::user()->id == auth()->user()->hasRole('writer')) { //validacion de rol escritor
            $id =  Crypt::decrypt($id_contactos);

            if (Auth::user()->id == $id) {
                $contacto = contactos::join("users", "contactos.fk_correo", "=", "users.id")
                    ->where('contactos.fk_correo', $id)
                    // ->find('users.id', $login_user)
                    ->get();
                return view('contacto/referencia', compact('contacto'), [
                    'concepto_pagos' => concepto_pagos::all(),
                    'carreras' => carreras::all(), 'usuarios' => usuarios::all(),
                    'modalidades' => modalidades::all(), 'planteles' => planteles::all(),
                    'becas' => becas::all()
                ]);
            } else {
                return redirect('dashboard/'); //validacion de rol
            }
        } elseif (Auth::user()->id == auth()->user()->hasRole('admin')) { //validacion de rol admin
            $id =  Crypt::decrypt($id_contactos);

            $user = user::find($id);

            $contacto = contactos::join("users", "contactos.fk_correo", "=", "users.id")
                ->where('contactos.id_contactos', $id)
                ->get();

            // DD($contacto);
            // exit;
            return view('contacto/referencia', compact('contacto', 'user'), [
                'concepto_pagos' => concepto_pagos::all(),
                'carreras' => carreras::all(), 'usuarios' => usuarios::all(),
                'modalidades' => modalidades::all(), 'planteles' => planteles::all(),
                'becas' => becas::all()
            ]);
        } else {
            return redirect('dashboard/'); //validacion de rol
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::user()->id == auth()->user()->hasRole('admin')) {
            $users = User::all();
            return view('contacto.crear', compact('users'), [
                'concepto_pagos' => concepto_pagos::all(),
                'carreras' => carreras::all(), 'usuarios' => usuarios::all(),
                'modalidades' => modalidades::all(), 'planteles' => planteles::all(),
                'becas' => becas::all()
            ]);
        } else {
            return redirect('dashboard/');
        } //validacion de rol
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "holaaaads";
        if (Auth::user()->id == auth()->user()->hasRole('admin')) {

            $request->validate([

                //unique:posts|
                'txtcorreo1' => 'required|max:40',
                'txtpassword1' => 'required|max:18',
                'numero_celular' => 'required|max:10',
                'numero_telefono' => 'required|max:10',
                'txt_plantel1' => 'required',

                'txtnombre1' => 'required|max:50',
                'txt_apellido_p' => 'required|max:50',
                'txt_apellido_m' => 'required|max:50',
                'txt_carrera' => 'required',
                'txt_modalidad' => 'required',
                'txt_beca1' => 'required',

            ]);

            $users = new User();
            $alumnos_usuarios = new usuarios();
            $contactos = new contactos();

            $users->name = $request->get('txtnombre1');
            $users->email = $request->get('txtcorreo1');
            $users->password=bcrypt($request->get('txtpassword1'));

            $users->save();
            $fk_users=$users['id'];
            echo $fk_users;
            // die();

            $alumnos_usuarios->apellido_paterno = $request->get('txt_apellido_p');
            $alumnos_usuarios->apellido_materno = $request->get('txt_apellido_m');
            $alumnos_usuarios->fk_carrera = $request->get('txt_carrera');
            $alumnos_usuarios->fk_modalidad = $request->get('txt_modalidad');
            $alumnos_usuarios->fk_beca = $request->get('txt_beca1');
            $alumnos_usuarios->fk_users = $fk_users;

            $alumnos_usuarios->save();
            echo $alumnos_usuarios;
            $fk_matricula = $alumnos_usuarios['id_matricula'];
            echo $fk_matricula;
            // die();

            $contactos->num_celular = $request->get('numero_celular');
            $contactos->num_telefono = $request->get('numero_telefono');
            $contactos->fk_plantel = $request->get('txt_plantel1');
            echo $contactos->fk_usuario = $fk_matricula;
            $contactos->fk_correo = $fk_users;

            $contactos->save();
            return redirect('dashboard/');
        } else {
            return redirect('dashboard/');
        }
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
    public function edit($id_contactos)
    {
        if (Auth::user()->id == auth()->user()->hasRole('admin')) {

            $usuarios = usuarios::all();
            $planteles = planteles::all();
            $carreras = carreras::all();
            $modalidades = modalidades::all();
            $becas = becas::all();
            $User = User::all();
            $id =  Crypt::decrypt($id_contactos);
            // $contacto = contactos::where('fk_correo', $id)->get();
            $contacto = contactos::find($id);
            // print_r($contacto);
            // die();

            return view('contacto.editar', compact(
                'contacto',
                $contacto,
                'usuarios',
                $usuarios,
                'planteles',
                $planteles,
                'carreras',
                $carreras,
                'modalidades',
                $modalidades,
                'becas',
                $becas,
                'User',
                $User
            ));
        } else {
            return redirect('dashboard/');
        } //validacion de rol
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

        if (Auth::user()->id == auth()->user()->hasRole('admin')) {
            $contacto = contactos::find($id_contacto);
            $fk_usuario = $contacto['fk_usuario'];
            $fk_correo = $contacto['fk_correo'];

            $usuario = usuarios::find($fk_usuario);

            $user = User::find($fk_correo);

            $request->validate([

                'txtcorreo1' => 'required|email',
                // 'txtpassword1' => 'required|max:18',
                'txtnombre1' => 'required|max:50',
                'numero_celular' => 'required|max:10',
                'numero_telefono' => 'required|max:10',
                'txt_plantel1' => 'required',

                'txt_apellido_p' => 'required|max:50',
                'txt_apellido_m' => 'required|max:50',
                'txt_carrera' => 'required',
                'txt_modalidad' => 'required',
                'txt_beca1' => 'required',

            ]); //validador de los campos

            $user->name = $request->get('txtnombre1');
            $user->email = $request->get('txtcorreo1');
            // $user->password=bcrypt($request->get('txtpassword1'));

            $user->save();

            $usuario->apellido_paterno = $request->get('txt_apellido_p');
            $usuario->apellido_materno = $request->get('txt_apellido_m');
            $usuario->fk_carrera = $request->get('txt_carrera');
            $usuario->fk_modalidad = $request->get('txt_modalidad');
            $usuario->fk_beca = $request->get('txt_beca1');

            $usuario->save();

            $contacto->num_celular = $request->get('numero_celular');
            $contacto->num_telefono = $request->get('numero_telefono');
            $contacto->fk_plantel = $request->get('txt_plantel1');
            $contacto->fk_usuario = $fk_usuario;
            $contacto->fk_correo = $fk_correo;

            $contacto->save();

            return redirect('contacto/');
        } else {
            return redirect('dashboard/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\contactos  $contactos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_contactos)
    {
        if (Auth::user()->id == auth()->user()->hasRole('admin')) {

            $contacto = contactos::find($id_contactos);
            echo $fk_usuariodelete = $contacto['fk_usuario'];
            echo $fk_correodelete = $contacto['fk_correo'];

            $contacto->delete();

            $id_usuario = usuarios::find($fk_usuariodelete);
            $id_usuario->delete();

            $id_user = User::find($fk_correodelete);
            $id_user->delete();

            return redirect("contacto/");
        } else {
            return redirect('dashboard/');
        }
    }
}
