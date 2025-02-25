<x-app-layout>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __( 'Datos del usuario' ) }}
        </h2>
    </x-slot>
    <!-- Student details-->
    <div class="p-4 flex justify-center text-white">
        <div class="bg-slate-700 w-3/4 rounded-md p-4">
            <h1 class="text-2xl capitalize text-center">
                {{ $user->name }} {{ $user->last_name }}
            </h1>
            <hr>
            <h3 class="text-1xl">
                Email:
            </h3>
            <p class="mb-2">
                {{  $user->email }}
            </p>

            <h3 class="text-1xl mb-2">
                Teléfono:
            </h3>
            <p class="mb-2">
                {{ $user->phone }}
            </p>

            @if (Auth::user() && $user->role == 'student')
            <h3 class="text-1xl mb-2">
                Dirección:
            </h3>
            <p class="mb-2">
                {{ $user->address }}
            </p>

            <h3 class="text-1xl mb-2">
                Ciudad:
            </h3>
            <p class="mb-2">
                {{ $user->city }}
            </p>
            @endif
            @if ( Auth::user() && $user->role =='teacher')
                <h3 class="text-1xl mb-2">
                    Especialidad:
                </h3>
                <p class="mb-2">
                    {{ $user->specialty }}
                </p>
            @endif
            
            @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-4 mt-4">
                {{ session('error') }}
            </div>
            @endif
            @if ( Auth::user() && Auth::user()->isStudent())
            <div class="flex justify-center items-center">
                <div>
                    <x-buttons.link-to-button  route="public.course.index" label="Volver"/>
                </div>
            </div>    
            @endif
            @if ( Auth::user() && (Auth::user()->isTeacher() || Auth::user()->isAdmin()))
            <div class="flex justify-center items-center">
                <div>
                    <x-buttons.link-to-button  route="dashboard" label="Volver"/>
                </div>
            </div>
            @endif
        </div>
    </div>
    <x-slot name="footer">
        {{ __('Mogara') }}
    </x-slot>
</x-app-layout>