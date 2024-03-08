<x-app-layout>
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    @role('admin', 'web')
                        {{ __('tabla de usuarios') }}
                        <table id="tablevh" class="table table-striped ">
                            <thead class="table-light">
                                <tr>
                                    <th>NOMBRE</th>
                                    <th>CORREO</th>
                                    <th>ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>

                                        <form action="{{ route('usuarios_ext.destroy', $user->id) }}" method="POST">
                                            <td>
                                                <a href="{{ route('usuarios_ext.edit', Crypt::encrypt($user->id)) }}"
                                                    class="btn btn-warning btn-sm">editar &#9998;</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit button" class="btn btn-danger btn-sm">eliminar
                                                    &#x78;</button>
                                            </td>

                                        </form>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    @else
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
