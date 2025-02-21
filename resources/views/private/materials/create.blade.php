<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Materiales del curso') }}
        </h2>
    </x-slot>

    <div class="p-4 flex justify-center">
        <x-form.form ruta="{{ route('private.material.store') }}" nombre="{{$course->name}}" metodo="POST">
            <input type="hidden" name="course_id" value="{{$course->id}}">
            <label for="type">Tipo</label>
            <select name="type" id="type">
                <option value="pdf">{{ __('PDF') }}</option>
                <option value="video">{{ __('Vídeo') }}</option>
                <option value="link">{{ __('Link') }}</option>
                <option value="repository">{{ __('Repositorio') }}</option>
            </select>
            <x-form.input tipo="text" nombre="url" id="url" label="URL"/>
            <div class="flex justify-center items-center">
                <div>
                    <x-buttons.save-button />
                </div>
            </div>
        </x-form.form>
    </div>

    <x-slot name="footer">
        {{ __('Mogara') }}
    </x-slot>
</x-app-layout>
