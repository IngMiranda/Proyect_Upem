<!DOCTYPE html>
{{-- @extends('layout/template') --}}
hoa
<html lang="en">
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
    {{-- @php
    echo $id_usuario;   
    @endphp --}}
</body>
</html>