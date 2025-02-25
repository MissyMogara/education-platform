<x-app-layout>
    <x-slot name="header">
        @if ($user->role == 'teacher')
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Editar Profesor') }}
            </h2>       
        @endif
        @if ($user->role == 'student')
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Editar Estudiante') }}
            </h2>
        @endif
    </x-slot>

    <div class="p-4 flex justify-center">
        <x-form.form ruta="{{ route('private.user.update', ['id' => $user->id]) }}" nombre="Editar usuario" metodo="put">
        
        <x-form.input tipo="text" nombre="name" id="name" label="Nombre" required="required" :valor="$user->name"/>
        <x-form.input tipo="text" nombre="last_name" id="last_name" label="Apellidos" :valor="$user->last_name" />
        <x-form.input tipo="email" nombre="email" id="email" label="Email" required="required" :valor="$user->email" />
        <x-form.input tipo="text" nombre="dni" id="dni" label="DNI" required="required" :valor="$user->dni" />
        <x-form.input tipo="password" nombre="password" id="password" label="Contraseña" required="required" :valor="$user->password" />
        <x-form.input tipo="tel" nombre="phone" id="phone" label="Teléfono" :valor="$user->phone"/>
        @if ($user->role == 'student')
            <x-form.input tipo="text" nombre="address" id="address" label="Dirección" :valor="$user->address"/>
            <x-form.input tipo="text" nombre="city" id="city" label="Ciudad" :valor="$user->city"/>   
        @endif
        @if ($user->role == 'teacher')
            <x-form.input tipo="text" nombre="specialty" id="specialty" label="Especialidad" :valor="$user->specialty"/>
        @endif
        <div class="flex justify-center items-center">
            <div>
                <x-buttons.save-button />
            </div>
            <div class="ms-2 mt-2">
                <x-buttons.link-to-button route="dashboard" label="Volver" />
            </div>
        </div>
        </x-form.form>
    </div>

    <x-slot name="footer">
        {{ __('Mogara') }}
    </x-slot>
</x-app-layout>
