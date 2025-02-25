<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>

    <div class="p-4 flex justify-center">
        <x-form.form ruta="{{ route('private.course.store') }}" nombre="Crear Curso" metodo="POST">
            <x-form.input tipo="text" nombre="name" id="name" label="Nombre del curso" required="required" />
            <x-form.input tipo="text" nombre="description" id="description" label="Descripción" required="required" />
            <label class="block mb-2 text-sm font-medium text-gray-900">Categoria</label>
            <select name="category" id="category" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @if (Auth::user()->isTeacher())
                <input type="hidden" name="teacher" id="teacher" value="{{ Auth::user()->id }}">
            @else
                <label class="block mb-2 text-sm font-medium text-gray-900">Profesor</label>
                <select name="teacher" id="teacher" required>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
            @endif

            <x-form.input tipo="number" nombre="duration" id="duration" label="Duración" required="required" />
            <input type="hidden" name="status" id="status" value="active">

            <div class="flex justify-center items-center">
                <div>
                    <x-buttons.save-button />
                </div>
                <div class="ms-2 mt-2">
                    <x-buttons.link-to-button route="public.evaluation.index" label="Volver" />
                </div>
            </div>
        </x-form.form>
    </div>

    <x-slot name="footer">
        {{ __('Mogara') }}
    </x-slot>
</x-app-layout>
