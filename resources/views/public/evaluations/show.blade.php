<x-app-layout>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evaluaciones') }}
        </h2>
    </x-slot>
    <!-- Student details-->
    <div class="p-4 flex justify-center text-white">
        <div class="bg-slate-700 w-3/4 rounded-md p-4">
            <h1 class="text-2xl capitalize text-center">
                {{ $evaluation->course->name }}
            </h1>
            <hr>
            <h2 class="text-1xl capitalize text-center">
                <!-- If user is admin then can see the student name-->
                @if (Auth::user() && Auth::user()->isAdmin())
                Nombre alumno: {{ $evaluation->student->name }}
                @endif
            </h2>
            <h3 class="text-1xl">
                Nota final: {{ $evaluation->final_grade}}
            </h3>
            <h3 class="text-1xl mb-2">
                Comentario:
            </h3>
            <p>
                {{ $evaluation->comments }}
            </p>
            @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4 mt-4">
                {{ session('error') }}
            </div>
            @endif
            <div class="flex justify-center items-center">
                <div>
                    <x-buttons.link-to-button  route="public.evaluation.index" label="Volver"/>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer">
        {{ __('Mogara') }}
    </x-slot>
</x-app-layout>