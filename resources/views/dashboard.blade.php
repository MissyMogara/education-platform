<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Muy buenas,') }} {{ Auth::user()->name }}!
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4">
                        <x-table.table>
                            @if (session('success'))
                                <div class="bg-green-500 text-white p-4 rounded mb-4 mt-4">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="flex">
                                <div class="mb-5 mt-5 me-2 flex justify-center">
                                    <x-buttons.link-to-button label="Crear Alumno" route="private.user.create.student" />
                                </div> 
                                <div class="mb-5 mt-5 ms-2 flex justify-center">
                                    <x-buttons.link-to-button label="Crear Profesor" route="private.user.create.teacher" />
                                </div>
                            </div>

                            <thead>
                                <tr>
                                    <x-table.th>Nombre</x-table.th>
                                    <x-table.th>Apellidos</x-table.th>
                                    <x-table.th>DNI</x-table.th>
                                    <x-table.th>Email</x-table.th>
                                    <x-table.th>Rol</x-table.th>
                                    <x-table.th>Opciones</x-table.th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <x-table.td>{{ $user->name }}</x-table.td>
                                        <x-table.td>{{ $user->last_name }}</x-table.td>
                                        <x-table.td>{{ $user->dni }}</x-table.td>
                                        <x-table.td>{{ $user->email }}</x-table.td>
                                        <x-table.td>{{ $user->role }}</x-table.td>
                                        <x-table.td>
                                            <div class="flex justify-around items-center">
                                                <div class="me-1">
                                                    <x-buttons.view-button label="Ver" route="public.user.show" :id="$user->id" />
                                                </div>
                                                @if (Auth::user()->isAdmin())
                                                <div class="ms-1 me-1">
                                                    <x-buttons.edit-button label="Editar" route="private.user.edit" :id="$user->id" />
                                                </div>
                                                <div class="ms-1 me-1">
                                                    <x-buttons.delete-button label="Borrar" route="private.user.destroy" :id="$user->id" 
                                                        :message="'¿Estás seguro de que deseas eliminar a este usuario?'" />
                                                </div>
                                                @endif
                                            </div>
                                        </x-table.td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </x-table.table>
                        
                        <div>
                            {{ $users->links() }}
                        </div>                
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer">
        {{ __('Mogara') }}
    </x-slot>
</x-app-layout>
