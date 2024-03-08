<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

class user_externosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        // if (Auth::user()->id == $role[0]['id']) {//validacion de rol

        // die();
        if (Auth::user()->id == auth()->user()->hasRole('admin')) {

            return  view('contacto/usuarios_externos', compact('users'));
        } else {
            return redirect('dashboard/');
        }
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
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id == auth()->user()->hasRole('admin')) {
            $id_users =  Crypt::decrypt($id);

            $User = User::find($id_users);

            return view('contacto/editar_ext', compact('User'));
        } else {
            return redirect('dashboard/');
        } //validacion de rol
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        echo $id;
        //txtcorreo_user  name
        $user = User::find($id);
        echo $user;

        $request->validate([

            'txtcorreo_user' => 'required|email',
            'name' => 'required|max:50',
        ]);

        $user->email = $request->get('txtcorreo_user');
        $user->name = $request->get('name');
        // die();

        $user->save();
        return redirect('usuarios_ext');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        $user = User::find($id_user);
        $user->delete();

        return redirect("usuarios_ext/");
    }
}
