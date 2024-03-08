<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            {{ __('hola inicio !') }}
                        </div>
                        <table id="tablevh" class="table table-striped ">
                            <thead class="table-light">
                                <tr>
                                    <th>MATRICULA</th>
                                    <th>CORREO</th>
                                    <th>NOMBRE</th>
                                    <th>REFERENCIA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $usuario[0]->id_matricula }}</td>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ Auth::user()->email }}</td>
                                        <td>
                                            <a href="{{ route('contacto.upemref', Crypt::encrypt(Auth::user()->id)) }}"
                                                class="btn btn-warning btn-sm">referencia({{ Auth::user()->name }})-&#128462;</a>
                                        </td>

                                </tr>
                            </tbody>

                        </table>
                </div>
            </div>
        </div>
    </x-app-layout>
