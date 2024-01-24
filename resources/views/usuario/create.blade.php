<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>registrar usuario</title>
</head>
<body>
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

            txt_plantel1
            <form action="{{ url('usuario/index') }}" method="post">

                @csrf
                
                <div class="mb-3 row">
                    <label for="txtnombre1" class="col-sm-2 col-form-label">capacidad_arrastre_carga</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="txtnombre1" id="txtnombre1" value="{{ old('txtnombre1') }}"
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txt_apellido_p" class="col-sm-2 col-form-label">capacidad_arrastre_carga</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="txt_apellido_p" id="txt_apellido_p" value="{{ old('txt_apellido_p') }}"
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txt_apellido_m" class="col-sm-2 col-form-label">capacidad_arrastre_carga</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" name="txt_apellido_m" id="txt_apellido_m" value="{{ old('txt_apellido_m') }}"
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txt_carrera" class="col-sm-2 col-form-label">marca</label>
                    <div class="col-sm-5">
                        <select name="txt_carrera" id="txt_carrera" class="form-select" required>
                            <option value="">selccionar marca</option>
                            @foreach ($carreras as $carrera)
                                <option value="{{ $carrera->id_carrera }}">{{ $carrera->nombre_carrera }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txt_modalidad" class="col-sm-2 col-form-label">pasajeros</label>
                    <div class="col-sm-5">
                        <select name="txt_modalidad" id="txt_modalidad" class="form-select" required>
                            <option value="">selcciona la cantidad de pasajeros</option>
                            @foreach ($modalidades as $modalidad)
                                <option value="{{ $modalidad->id_modalidad }}">{{ $modalidad->tipo_modalidad }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="txt_beca1" class="col-sm-2 col-form-label">% beca</label>
                    <div class="col-sm-5">
                        <select name="txt_beca1" id="txt_beca1" class="form-select" required>
                            <option value="">selccionar categoria</option>
                            @foreach ($becas as $beca)
                                <option value="{{ $beca->id_beca }}">{{ $beca->porcentaje_beca }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <a href="{{ url('usuario/index') }}" class="btn btn-secondary">regresar</a>
                <button type="submit" class="btn btn-success">agregar</button>
            </form>
        </div>
    </main>

</body>

</html>

</body>
</html>