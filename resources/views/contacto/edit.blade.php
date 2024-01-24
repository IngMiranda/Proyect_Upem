<!DOCTYPE html>
<html lang="en">
{{-- @extends('layout/tile') --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>editar contacto</title>
</head>

<body>
    holaa


    <main>
        <div class="container py-4">
            <h1>editar vehiculos</h1>
            {{-- @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert"> 
                     <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif--}}
           
            <form action="/contacto/{{ $contacto->id_contacto }}" method="POST">
                @method('PUT')
                @csrf
                <div class="col-md-3">
                    <label for="id_contacto" class="col-sm-2 col-form-label">id del contacoto del usuario</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="id_contacto" id="id_contacto"
                            value="{{ $contacto->id_contactos }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" name="txtcorreo1" placeholder="ejm@dominio.com" 
                    value="{{ $contacto->correo }}">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" name="txtpassword1" 
                    placeholder="letras numeros mayusculas caracter especial" value="{{ $contacto->password }}">
                </div>
                <div class="col-md-4">
                    <label for="numero_celular" class="col-sm-2 col-form-label">numero celular/label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="numero_celular" id="numero_celular"
                            value="{{ $contacto->num_celular }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="numero_telefono" class="col-sm-2 col-form-label">numero de telefono</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="numero_telefono" id="numero_telefono"
                            value="{{ $contacto->num_telefono }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="txtnombre1" class="col-sm-2 col-form-label">nombre del usuario</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="txtnombre1" id="txtnombre1"
                            value="{{ $contacto->usuarios[0]->nom_usuario }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="txt_apellido_p" class="col-sm-2 col-form-label">apellido paterno</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="txt_apellido_p" id="txt_apellido_p"
                            value="{{ $contacto->usuarios[0]->apellido_paterno }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="txt_apellido_m" class="col-sm-2 col-form-label">id del contacoto del usuario</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="txt_apellido_m" id="txt_apellido_m"
                            value="{{ $contacto->usuarios[0]->apellido_materno  }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txt_modalidad" class="col-sm-2 col-form-label">id del contacoto del usuario</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="txt_modalidad" id="txt_modalidad"
                            value="{{ $contacto->usuarios[0]->modalidades[0]->tipo_modalidad }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txt_beca1" class="col-sm-2 col-form-label">beca del usuario</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="txt_beca1" id="txt_beca1"
                            value="{{ $contacto->usuarios[0]->becas[0]->porcentaje_beca }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txt_carrera" class="col-sm-2 col-form-label">id del contacoto del usuario</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="txt_carrera" id="txt_carrera"
                            value="{{ $contacto->usuarios[0]->carreras[0]->nombre_carrera }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="txt_plantel1" class="col-sm-2 col-form-label">NOMBRE DEL PLANTEL</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="txt_plantel1" id="txt_plantel1"
                            value="{{ $contacto->planteles[0]->nom_plantel }}" required>
                    </div>
                </div>

                <a href="{{ url('/') }}" class="btn btn-secondary">regresar</a>
                <button type="submit" class="btn btn-success">editar</button>
            </form>
        </div>
    </main>

</body>

</html>
