<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> --}}
                {{-- <div class="p-6 text-gray-900 dark:text-gray-100"> --}}
                    {{ __('tabla de usuarios') }}
                    @if (auth()->user()->hasRole('reader'))
                    @else


                    @role('admin')
                        <a  class="btn btn-primary" href="{{ url('contacto/create') }}"
                            class="btn btn-success btn-sm">registrar usuario</a>
                    @endrole

                    <table id="tablevh" class="table table-striped-columns table-auto">
                        <thead class="table-light">
                            <tr>
                                <th>MATRICULA</th>
                                <th>CORREO</th>
                                <th>NOMBRE</th>
                                @if (auth()->user()->hasRole('admin'))
                                    <th>PLANTEL</th>
                                    <th>CARRERA</th>
                                    <th>ACCION</th>
                                @elseif (auth()->user()->hasRole('writer'))
                                    <th>REFERENCIA</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @if (auth()->user()->hasRole('admin'))
                                @foreach ($contactos as $contacto)
                                    <tr>
                                        <td>{{ $contacto->usuarios[0]->id_matricula }}</td>
                                        <td>{{ $contacto->user[0]->email }}</td>
                                        <td>{{ $contacto->user[0]->name }}</td>
                                        <td>{{ $contacto->planteles[0]->nom_plantel }}</td>
                                        <td>{{ $contacto->usuarios[0]->carreras[0]->nombre_carrera }}</td>



                                        <form action="{{ route('contacto.destroy', $contacto->id_contactos) }}"
                                            method="POST">
                                            <td>
                                               @if (auth()->user()->hasRole('admin'))
                                                    <a href="{{ route('contacto.upemref', Crypt::encrypt($contacto->id_contactos)) }}"{{-- /contacto/{{ $contacto->id_contactos }}/upemref --}}
                                                        class="btn btn-secondary btn-sm">referencia &#128462;</a>
                                                    <a href="{{ route('contacto.edit', Crypt::encrypt($contacto->id_contactos)) }}"{{-- /contacto/{{ $contacto->id_contactos }}/edit --}}
                                                        class="btn btn-warning btn-sm">editar &#9998;</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit button" class="btn btn-danger btn-sm">eliminar
                                                        &#x78;</button>
                                                @endif
                                            </td>
                                        </form>

                                    </tr>
                                @endforeach
                            @elseif (auth()->user()->hasRole('writer'))
                                <tr>
                                    <td>{{ $usuario[0]->id_matricula }}</td>
                                    <td>{{ Auth::user()->name }}</td>
                                    <td>{{ Auth::user()->email }}</td>
                                    <td>
                                        <a href="{{ route('contacto.upemref', Crypt::encrypt(Auth::user()->id)) }}"
                                            class="btn btn-secondary btn-sm">referencia({{ Auth::user()->name }})-&#128462;</a>
                                    </td>
                                </tr>

                            @endif
                        </tbody>
                    </table>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
