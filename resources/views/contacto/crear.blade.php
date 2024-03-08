<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @role('admin', 'web')
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __('registrar usuario!') }}
                    </div>
                    <form action="{{ url('contacto/') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="col-md-4">
                            <label for="inputEmail4" class="col-sm-2 col-form-label">CORREO</label>
                            <div class="col-sm-5">
                                <input type="email" class="form-control" name="txtcorreo1" id="txtcorreo1"
                                    placeholder="ejm@dominio.com" value="{{ old('txtcorreo1') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="inputPassword4" class="col-sm-2 col-form-label">CONTRASEÑA</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="txtpassword1" id="txtpassword1"
                                    placeholder="letras numeros mayusculas caracter especial" minlength="12"
                                    maxlength="18"value="{{ old('txtpassword1') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="numero_celular" class="col-sm-2 col-form-label">NUMERO DE CELULAR</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="numero_celular" id="numero_celular"
                                    value="{{ old('numero_celular') }}" minlength="10" maxlength="10" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="numero_telefono" class="col-sm-2 col-form-label">NUMERO DE CASA </label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="numero_telefono" id="numero_telefono"
                                    value="{{ old('numero_telefono') }}" minlength="10" maxlength="10" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="txtnombre1" class="col-sm-2 col-form-label">NOMBRE</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="txtnombre1" id="txtnombre1"
                                    value="{{ old('txtnombre1') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="txt_apellido_p" class="col-sm-2 col-form-label">APELLIDO PATERNO</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="txt_apellido_p" id="txt_apellido_p"
                                    value="{{ old('txt_apellido_p') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="txt_apellido_m" class="col-sm-2 col-form-label">APELLIDO MATERNO</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="txt_apellido_m" id="txt_apellido_m"
                                    value="{{ old('txt_apellido_m') }}" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="txt_plantel1" class="col-sm-2 col-form-label">PLANTEL</label>
                            <div class="col-sm-5">
                                <select name="txt_plantel1" id="txt_plantel1" class="form-select" required>
                                    <option value="">selccionar plantel</option>
                                    @foreach ($planteles as $plantel)
                                        <option value="{{ $plantel->id_plantel }}">{{ $plantel->nom_plantel }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="txt_carrera" class="col-sm-2 col-form-label">CARRERA</label>
                            <div class="col-sm-5">
                                <select name="txt_carrera" id="txt_carrera" class="form-select" required>
                                    <option value="">selccionar carrera</option>
                                    @foreach ($carreras as $carrera)
                                        <option value="{{ $carrera->id_carrera }}">{{ $carrera->nombre_carrera }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="txt_modalidad" class="col-sm-2 col-form-label">PASAJEROS</label>
                            <div class="col-sm-5">
                                <select name="txt_modalidad" id="txt_modalidad" class="form-select" required>
                                    <option value="">selcciona la modalidad</option>
                                    @foreach ($modalidades as $modalidad)
                                        <option value="{{ $modalidad->id_modalidad }}">
                                            {{ $modalidad->tipo_modalidad }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="txt_beca1" class="col-sm-2 col-form-label">% BECA</label>
                            <div class="col-sm-5">
                                <select name="txt_beca1" id="txt_beca1" class="form-select" required>
                                    <option value="">selccionar beca</option>
                                    @foreach ($becas as $beca)
                                        <option value="{{ $beca->id_beca }}">{{ $beca->porcentaje_beca }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <a href="{{ url('/') }}" class="btn btn-secondary">regresar</a>
                        <button type="submit button" class="btn btn-success">agregar</button>
                    </form>
                @endrole
            </div>
        </div>
    </div>
</x-app-layout>
