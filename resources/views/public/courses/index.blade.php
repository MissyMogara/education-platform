<x-app-layout>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>
    <div class="p-4">
        <x-table.table>
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
                            <x-buttons.view-button label="Ver" route="public.course.show" :id="$course->id" />
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