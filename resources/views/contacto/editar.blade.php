<x-app-layout>
    @role('admin', 'web')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __('hola editar') }}
                    </div>
                    <main>
                        <div class="container py-4">
                            {{-- <h1>editar en vista de contacto</h1> --}}
                            {{-- @if ($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                             <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif --}}

                            <form action="/contacto/{{ $contacto->id_contactos }}" method="post">
                                @method('put')
                                @csrf
                                <div class="col-md-3">
                                    <label for="id_contacto" class="col-sm-2 col-form-label">MATRICULA</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="id_contacto" id="id_contacto"
                                            value="{{ $contacto->usuarios[0]->id_matricula }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Email</label>
                                    <div class="col-sm-5">
                                        <input type="email" class="form-control" name="txtcorreo1"
                                            placeholder="ejm@dominio.com" value="{{ $contacto->user[0]->email }}">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Password</label>
                            <input type="text"class="form-control" name="txtpassword1"
                            placeholder="letras numeros mayusculas caracter especial"
                            value="{{ $contacto->user[0]->password }}">Crypt::decrypt($contacto->user[0]->password) $contacto->user[0]->password
                        </div> --}}
                                <div class="col-md-4">
                                    <label for="numero_celular" class="col-sm-2 col-form-label">numero celular</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="numero_celular" id="numero_celular"
                                            value="{{ $contacto->num_celular }}" minlength="10" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="numero_telefono" class="col-sm-2 col-form-label">numero de telefono</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="numero_telefono"
                                            id="numero_telefono" value="{{ $contacto->num_telefono }}" minlength="10"
                                            maxlength="10" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="txtnombre1" class="col-sm-2 col-form-label">nombre del usuario</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="txtnombre1" id="txtnombre1"
                                            value="{{ $contacto->user[0]->name }}" required>
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
                                    <label for="txt_apellido_m" class="col-sm-2 col-form-label">apellido materno</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="txt_apellido_m" id="txt_apellido_m"
                                            value="{{ $contacto->usuarios[0]->apellido_materno }}" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="txt_modalidad" class="col-sm-2 col-form-label">MODALIDAD</label>
                                    <div class="col-sm-5">
                                        <select name="txt_modalidad" id="txt_modalidad" class="form-select" required>
                                            <option value="{{ $contacto->usuarios[0]->fk_modalidad }}">
                                                {{ $contacto->usuarios[0]->modalidades[0]->tipo_modalidad }}</option>
                                            @foreach ($modalidades as $modalidad)
                                                @if ($contacto->usuarios[0]->fk_modalidad != $modalidad->id_modalidad)
                                                    <option value="{{ $modalidad->id_modalidad }}">
                                                        {{ $modalidad->tipo_modalidad }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="txt_beca1" class="col-sm-2 col-form-label">BECA</label>
                                    <div class="col-sm-5">
                                        <select name="txt_beca1" id="txt_beca1" class="form-select" required>
                                            <option value="{{ $contacto->usuarios[0]->fk_beca }}">
                                                {{ $contacto->usuarios[0]->becas[0]->porcentaje_beca }}</option>
                                            @foreach ($becas as $beca)
                                                @if ($contacto->usuarios[0]->fk_beca != $beca->id_beca)
                                                    <option value="{{ $beca->id_beca }}">{{ $beca->porcentaje_beca }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="txt_carrera" class="col-sm-2 col-form-label">CARRERA</label>
                                    <div class="col-sm-5">
                                        <select name="txt_carrera" id="txt_carrera" class="form-select" required>
                                            <option value="{{ $contacto->usuarios[0]->fk_carrera }}">
                                                {{ $contacto->usuarios[0]->carreras[0]->nombre_carrera }}</option>
                                            @foreach ($carreras as $carrera)
                                                @if ($contacto->usuarios[0]->fk_carrera != $carrera->id_carrera)
                                                    <option value="{{ $carrera->id_carrera }}">
                                                        {{ $carrera->nombre_carrera }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="txt_plantel1" class="col-sm-2 col-form-label">PLANTEL</label>
                                    <div class="col-sm-5">
                                        <select name="txt_plantel1" id="txt_plantel1" class="form-select" required>
                                            <option value="{{ $contacto->fk_plantel }}">
                                                {{ $contacto->planteles[0]->nom_plantel }}</option>
                                            @foreach ($planteles as $plantel)
                                                @if ($contacto->planteles[0]->fk_plantel != $plantel->id_plantel)
                                                    <option value="{{ $plantel->plantel }}">{{ $plantel->nom_plantel }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <a href="{{ url('contacto') }}" class="btn btn-secondary">regresar</a>
                                <button type="submit button" class="btn btn-success">editar</button>
                            </form>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    @else
        @php
            return redirect('/');
            echo 'hola';
        @endphp
    @endrole
</x-app-layout>
