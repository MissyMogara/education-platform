<x-app-layout>
    <x-slot name="header">
        @if ($option == 'teacher')
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Crear Profesor') }}
            </h2>       
        @endif
        @if ($option == 'student')
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Crear Estudiante') }}
            </h2>
        @endif
    </x-slot>

    <div class="p-4 flex justify-center">
        <x-form.form ruta="{{ route('private.user.store') }}" nombre="Crear usuario" metodo="POST">
        @if ($option == 'teacher')
        <input type="hidden" name="role" value="teacher">
        @endif
        @if ($option == 'student')
        <input type="hidden" name="role" value="student">
        @endif
        
        <x-form.input tipo="text" nombre="name" id="name" label="Nombre" required="required"/>
        <x-form.input tipo="text" nombre="last_name" id="last_name" label="Apellidos"/>
        <x-form.input tipo="email" nombre="email" id="email" label="Email" required="required"/>
        <x-form.input tipo="text" nombre="dni" id="dni" label="DNI" required="required"/>
        <x-form.input tipo="password" nombre="password" id="password" label="Contraseña" required="required"/>
        <x-form.input tipo="tel" nombre="phone" id="phone" label="Teléfono"/>
        @if ($option == 'student')
            <x-form.input tipo="text" nombre="address" id="address" label="Dirección"/>
            <x-form.input tipo="text" nombre="city" id="city" label="Ciudad"/>   
        @endif
        @if ($option == 'teacher')
            <x-form.input tipo="text" nombre="specialty" id="specialty" label="Especialidad"/>
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
