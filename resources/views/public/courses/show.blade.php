<x-app-layout>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>
    <!-- Course details-->
    <div class="p-4 flex justify-center text-white">
        <div class="bg-slate-700 w-3/4 rounded-md p-4">
            <h1 class="text-2xl capitalize text-center">
                <!-- If user is admin then can see the course's id -->
                @if (Auth::user() && Auth::user()->isAdmin())
                {{ $course->id }}#
                @endif
            {{ $course->category->name }}
            </h1>
            <hr>
            <h2 class="text-1xl text-center capitalize">
                {{ $course->name}}
            </h2>
            <h3 class="text-1xl">
                Impartido por: {{ $course->teacher->name}}
            </h3>
            <h3 class="text-1xl mb-2">
                Duración: {{ $course->duration }} horas
            </h3>
            <p>
                {{ $course->description }}
            </p>
            <!-- If user is admin then can see the status -->
            @if (Auth::user() && Auth::user()->isAdmin())
                <p>{{ $course->status }}</p>
            @endif

            @if (Auth::user() && Auth::user()->isStudent())
                <x-buttons.to-enroll-button 
                label="Inscribirse" 
                route="public.course.enroll" 
                :course="$course->id"  
                :student="Auth::user()->id ?? null" 
                />
            @endif

            @if (session('error'))
                <div class="bg-red-500 text-white p-4 rounded mb-4 mt-4">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    <x-slot name="footer">
        {{ __('Mogara') }}
    </x-slot>
</x-app-layout>