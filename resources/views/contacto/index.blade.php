<!DOCTYPE html>
<html lang="en">
    {{-- @extends('layout/template') --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg " style="background-color: rgb(125, 26, 143);">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{ url('marcas/index') }}"
                        class="btn btn-success btn-sm">marcas</a>
                    <a class="nav-link" href="{{ url('usuario/create') }}"
                        class="btn btn-success btn-sm">registrar usuario</a>
                    <a class="nav-link" href="{{ url('categorias/index') }}"
                        class="btn btn-success btn-sm">categoria</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="cuerpo bg-secondary">
        <div class="container h-100">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <table class="table table-striped table-bordered table-responsive table table-primary table-striped"
                        id="tablevh">
                        <thead class="table-light">
                            <tr>
                                <th>MARCA</th>
                                <th>NOMBRE</th>
                                <th>MOTOR</th>
                                <th>MODELO</th>
                                {{-- <th>ARRASTRE Y/O CARGA</th> --}}
                                <th>CATEGORIA</th>
                                {{-- <th>NUM.PASAJEROS</th> --}}
                                {{-- <th>TIPO</th> --}}
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contactos as $contacto)
                                <tr>
                                    {{-- <td>{{ $contacto->id_contactos }}</td> --}}
                                    <td>{{ $contacto->id_contactos }}</td>
                                    <td>{{ $contacto->correo }}</td>
                                    <td>{{ $contacto->num_telefono }}</td>
                                    <td>{{ $contacto->num_celular }}</td>
                                    {{-- <td>{{ $contacto->fk_plantel }}</td> --}}
                                    <td>{{ $contacto->planteles[0]->nom_plantel }}</td>
                                    <td>{{ $contacto->usuarios[0]->nom_usuario }}</td>
                                    <td>{{ $contacto->usuarios[0]->apellido_paterno }}</td>
                                    <td>{{ $contacto->usuarios[0]->apellido_materno }}</td>
                                    {{-- <td>{{ $contacto->usuarios[0]->fk_carrera }}</td> --}}
                                    <td>{{ $contacto->usuarios[0]->modalidades[0]->tipo_modalidad }}</td>
                                    <td>{{ $contacto->usuarios[0]->becas[0]->porcentaje_beca }}</td>
                                    <td>{{ $contacto->usuarios[0]->carreras[0]->nombre_carrera }}</td>
                                    
                                    <form action="{{ route('contacto.destroy', $contacto->id_contactos) }}" method="POST">
                                        <td><a href="/contacto/{{ $contacto->id_contactos }}/edit"
                                                class="btn btn-warning btn-sm">editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">eliminar</button>
                                        </td>
                                    </form>
                                    {{-- este form pone las opciones de editar y eliminar en cada uno de los registros que existan  --}}

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
