<x-app-layout>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>
    <!-- Options for admin and teachers -->
    @if (Auth::user() && (Auth::user()->isAdmin() || Auth::user()->isTeacher()))
    <div class="mb-5 mt-5 flex justify-center">
        <x-buttons.link-to-button label="Crear curso" route="private.course.create" />
    </div>    
    @endif
    <div class="p-4">
        <x-table.table>
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4 mt-4">
                    {{ session('success') }}
                </div>
            @endif
            <thead>
                <tr>
                    <x-table.th>Nombre</x-table.th>
                    <x-table.th>Descripción</x-table.th>
                    <x-table.th>Categoria</x-table.th>
                    <x-table.th>Profesor</x-table.th>
                    <x-table.th>Duración</x-table.th>
                    <x-table.th>Opciones</x-table.th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <x-table.td>{{ $course->name }}</x-table.td>
                        <x-table.td>{{ $course->description }}</x-table.td>
                        <x-table.td>{{ $course->category->name }}</x-table.td>
                        <x-table.td>{{ $course->teacher->name }}</x-table.td>
                        <x-table.td>{{ $course->duration }}</x-table.td>
                        <x-table.td>
                            <div class="flex justify-around items-center">
                                <div class="me-1">
                                    <x-buttons.view-button label="Ver" route="public.course.show" :id="$course->id" />
                                </div>
                                @if (Auth::user()->isAdmin() || Auth::user()->isTeacher())
                                <div class="ms-1 me-1">
                                    <x-buttons.edit-button label="Editar" route="private.course.edit" :id="$course->id" />
                                </div>
                                <div class="ms-1">
                                    <x-buttons.delete-button label="Borrar" route="private.course.destroy" :id="$course->id" 
                                        :message="'¿Estás seguro de que deseas eliminar este curso?'" />
                                </div>
                                @endif
                            </div>
                        </x-table.td>
                    </tr>
                @endforeach
            </tbody>
        </x-table.table>
        
        <div>
            {{ $courses->links() }}
        </div>
        
    </div>
    <x-slot name="footer">
        {{ __('Mogara') }}
    </x-slot>
</x-app-layout>