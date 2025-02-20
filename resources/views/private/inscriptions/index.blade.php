<x-app-layout>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>
    <!-- Options for admin and teachers -->
    <div class="p-4">
        <x-table.table>
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded mb-4 mt-4">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4 mt-4">
                {{ session('error') }}
            </div>
            @endif
            <div class="flex justify-center">
                <div>
                    <form action="{{ route('private.inscription.search') }}" method="GET">
                        <label for="" class="mr-2 text-white">Buscar por:</label>
                        <select name="option" id="" class="border border-gray-300 rounded-lg px-8">
                            <option value="course">Curso</option>
                            <option value="status">Estado</option>
                            <option value="student">Alumno</option>
                        </select>
                        <br>
                        <input type="text" name="inscription_query" placeholder="Buscar inscripción..." id="" class="mt-2 mr-2 border border-gray-300 rounded-lg px-2">
                        <button type="submit" class="bg-cyan-700 hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded-lg mt-3 mb-3">
                            Buscar
                        </button>
                    </form>
                </div>
            </div>
            <thead>
                <tr>
                    <x-table.th>Alumno</x-table.th>
                    <x-table.th>Curso</x-table.th>
                    <x-table.th>Estado</x-table.th>
                    <x-table.th>Opciones</x-table.th>
                </tr>
            </thead>
            <tbody>
                @foreach($inscriptions as $inscription)
                    <tr>
                        <x-table.td>{{ $inscription->student->name }}</x-table.td>
                        <x-table.td>{{ $inscription->course->name }}</x-table.td>
                        <x-table.td>{{ $inscription->status }}</x-table.td>
                        <x-table.td>
                            <div class="flex justify-around items-center">
                                <div>
                                    <x-buttons.aprove-reject-button label="Aprobar" :id="$inscription->id" 
                                        route="private.inscription.approve" 
                                    :message="'¿Estás seguro que quieres aprobar esta solicitud?'" />
                                </div>
                                <div>
                                    <x-buttons.aprove-reject-button label="Rechazar" :id="$inscription->id" 
                                        route="private.inscription.reject" 
                                    :message="'¿Estás seguro que quieres rechazar esta solicitud?'" />
                                </div>
                            </div>
                        </x-table.td>
                    </tr>
                @endforeach
            </tbody>
        </x-table.table>
        
        <div>
            {{ $inscriptions->links() }}
        </div>
        
    </div>
    <x-slot name="footer">
        {{ __('Mogara') }}
    </x-slot>
</x-app-layout>