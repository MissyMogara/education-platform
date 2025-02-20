<x-app-layout>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evaluaciones') }}
        </h2>
    </x-slot>
    <div class="p-4">
        @if ($evaluations->isEmpty())
            <p class="text-center text-gray-600 dark:text-gray-400">No hay evaluaciones disponibles</p>
        @else
        <x-table.table>
            @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4 mt-4">
                {{ session('success') }}
            </div>
            @endif
            <thead>
                <tr>
                    @if (Auth::user() && (Auth::user()->isAdmin() || Auth::user()->isTeacher())) 
                        <x-table.th>Nombre Alumno</x-table.th>
                    @endif
                    <x-table.th>Curso</x-table.th>
                    <x-table.th>Nota final</x-table.th>
                    <x-table.th>Opciones</x-table.th>
                </tr>
            </thead>
            <tbody>
                @foreach($evaluations as $evaluation)
                    <tr>
                        @if(Auth::user() && (Auth::user()->isAdmin() || Auth::user()->isTeacher())) 
                            <x-table.td>{{ $evaluation->student->name }}</x-table.td>
                        @endif
                        <x-table.td>{{ $evaluation->course->name }}</x-table.td>
                        <x-table.td>{{ $evaluation->final_grade }}</x-table.td>
                        <x-table.td>
                            <x-buttons.view-button label="Ver" route="public.evaluation.show" :id="$evaluation->id" />
                                @if (Auth::user() && (Auth::user()->isAdmin() || Auth::user()->isTeacher()))
                                    
                                @endif
                        </x-table.td>
                    </tr>
                @endforeach
            </tbody>
        </x-table.table>
        
        @endif

        
        <div>
            {{ $evaluations->links() }}
        </div>
        
    </div>
    <x-slot name="footer">
        {{ __('Mogara') }}
    </x-slot>
</x-app-layout>