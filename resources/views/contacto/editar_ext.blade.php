<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('editar usuarios externos') }}
                    <form action="/usuarios_ext/{{ $User->id }}" method="post">
                        @method('put')
                        @csrf
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Email</label>
                            <div class="col-sm-5">
                                <input type="email" class="form-control" name="txtcorreo_user"
                                placeholder="ejm@dominio.com" value="{{ $User->email }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="name" class="col-sm-2 col-form-label">id del contacto y usuario</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{ $User->name }}" >
                            </div>
                        </div>
                        <a href="{{ url('contacto') }}" class="btn btn-secondary">regresar</a>
                        <button type="submit button" class="btn btn-success">editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
