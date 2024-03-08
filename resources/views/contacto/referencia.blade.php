<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    {{-- {{ dd($contacto[0]->fk_correo) }} --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if (auth()->user()->hasRole('reader'))
                @else
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __('referencia') }}
                    </div>
                    @csrf
                    <div id="imp-ref" class="container" >
                        <form class="row g-3">
                            <div class="col-6">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" name="txtcorreo1"
                                    placeholder="ejm@dominio.com" value="{{ $contacto[0]->user[0]->email }}" disabled>
                            </div>
                            <div class="col-6">
                                <label for="numero_celular" class="form-label">matricula</label>
                                <input type="text" class="form-control" name="numero_celular" id="numero_celular"
                                    value="{{ $contacto[0]->usuarios[0]->id_matricula }}" minlength="10" maxlength="10"
                                    disabled>
                            </div>
                            <div class="col-4">
                                <label for="txtnombre1" class="form-label">nombre del usuario</label>
                                <input type="text" class="form-control" name="txtnombre1" id="txtnombre1"
                                    value="{{ $contacto[0]->user[0]->name }}" disabled>
                            </div>
                            <div class="col-4">
                                <label for="txt_apellido_p" class="form-label">apellido paterno</label>
                                <input type="text" class="form-control" name="txt_apellido_p" id="txt_apellido_p"
                                    value="{{ $contacto[0]->usuarios[0]->apellido_paterno }}" disabled>
                            </div>
                            <div class="col-4">
                                <label for="txt_apellido_m" class="form-label">apellido materno</label>
                                <input type="text" class="form-control" name="txt_apellido_m" id="txt_apellido_m"
                                    value="{{ $contacto[0]->usuarios[0]->apellido_materno }}" disabled>
                            </div>
                            <div class="col-2">
                                <label for="txt_modalidad" class="form-label">MODALIDAD</label>
                                <input type="text" class="form-control" name="txt_modalidad" id="txt_modalidad"
                                    value="{{ $contacto[0]->usuarios[0]->modalidades[0]->tipo_modalidad }}" disabled>
                            </div>
                            <div class="col-1">
                                <label for="txt_beca1" class="form-label">BECA</label>
                                <input type="text" class="form-control" name="txt_beca1" id="txt_beca1"
                                    value="{{ $contacto[0]->usuarios[0]->becas[0]->porcentaje_beca }}" disabled>
                            </div>
                            <div class="col-2">
                                <label for="txt_carrera" class="form-label">COSTO DE LA CARRERA</label>
                                <input type="text" class="form-control" name="txt_carrera" id="txt_carrera"
                                    value="${{ $contacto[0]->usuarios[0]->carreras[0]->costo_carrera }}" disabled>
                            </div>
                            <div class="col-4">
                                <label for="txt_carrera" class="form-label">CARRERA</label>
                                <input type="text" class="form-control" name="txt_carrera" id="txt_carrera"
                                    value="{{ $contacto[0]->usuarios[0]->carreras[0]->nombre_carrera }}" disabled>
                            </div>
                            <div class="col-3">
                                <label for="txt_plantel1" class="form-label">PLANTEL</label>
                                <input type="text" class="form-control" name="txt_plantel1" id="txt_plantel1"
                                    value="{{ $contacto[0]->planteles[0]->nom_plantel }}" disabled>
                            </div>
                            <div class="col-2">
                                @php
                                    $porcentaje_beca = floatval($contacto[0]->usuarios[0]->becas[0]->porcentaje_beca);
                                    $costo_carrera = floatval($contacto[0]->usuarios[0]->carreras[0]->costo_carrera);

                                    // Calcular el valor de la beca
                                    $beca = ($porcentaje_beca / 100) * $costo_carrera;
                                    $result = $costo_carrera - $beca;
                                @endphp
                                <label for="txt_carrera" class="form-label">CARRERA CON EL
                                    {{ $contacto[0]->usuarios[0]->becas[0]->porcentaje_beca }}</label>
                                <input type="text" class="form-control" name="txt_carrera" id="txt_carrera"
                                    value="$ {{ $result }}" disabled>
                            </div>

                            <div class="col-3">
                                <label for="concepto" class="form-label">CLAVE, CONCEPTO, P_V</label>
                                <select name="concepto" id="concepto" class="form-select" required>
                                    <option value="">
                                        SELECCIONE EL CONCEPTO </option>
                                    @foreach ($concepto_pagos as $carreraconcepto_pago)
                                        <option value="{{ $carreraconcepto_pago->id_clave_concepto }}">
                                            {{ $carreraconcepto_pago->clave_concepto }},
                                            {{ $carreraconcepto_pago->concepto }},
                                            {{ $carreraconcepto_pago->p_v }}
                                        </option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="py-4">
                                @role('admin', 'web')
                                    <a href="{{ url('contacto') }}" class="btn btn-secondary">regresar</a>
                                @else
                                    <a href="{{ url('contacto') }}" class="btn btn-secondary">regresar</a>
                                @endrole
                                <button type="button" class="btn-general"
                                    onclick="javascript:window.print()">&#x1f5a8;&#xfe0f Imprimir</button>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- <script>
        function imprim1(imp-ref){
        var printContents = document.getElementById('imp-ref').innerHTML;
                w = window.open();
                w.document.write(printContents);
                w.document.close(); // necessary for IE >= 10
                w.focus(); // necessary for IE >= 10
                w.print();
                w.close();
                return true;}
        </script> --}}

</x-app-layout>
