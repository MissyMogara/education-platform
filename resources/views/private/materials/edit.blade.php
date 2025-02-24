<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Materiales del curso') }}
        </h2>
    </x-slot>

    <div class="p-4 flex justify-center">
        <x-form.form ruta="{{ route('private.material.update', ['id' => $material->id]) }}" nombre="Editar material" metodo="put">
            <input type="hidden" name="course_id" value="{{$course->id}}">
            <label for="type">Tipo</label>
            <select name="type" id="type">
                @if ($material->type == 'pdf')
                    <option value="pdf" selected>{{ __('PDF') }}</option>
                @else
                    <option value="pdf">{{ __('PDF') }}</option>
                @endif
                
                @if ($material->type == 'video')
                    <option value="video" selected>{{ __('Vídeo') }}</option>
                @else
                    <option value="video">{{ __('Vídeo') }}</option>
                @endif
                
                @if ($material->type == 'link')
                    <option value="link" selected>{{ __('Link') }}</option>
                @else
                    <option value="link">{{ __('Link') }}</option>
                @endif

                @if ($material->type =='repository')
                    <option value="repository" selected>{{ __('Repositorio') }}</option>
                @else
                    <option value="repository">{{ __('Repositorio') }}</option>
                @endif
            </select>
            <x-form.input tipo="text" nombre="url" id="url" label="URL" :valor="$material->url" />
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