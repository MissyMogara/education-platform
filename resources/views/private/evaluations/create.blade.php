<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Evaluaciones') }}
        </h2>
    </x-slot>

    <div class="p-4 flex justify-center">
        <x-form.form ruta="{{ route('private.evaluation.store') }}" nombre="Crear Evaluación" metodo="POST">
            <x-form.input tipo="text" nombre="finalGrade" id="finalGrade" label="Nota final" required="required" />
            <label class="block mb-2 text-sm font-medium text-gray-900">Curso</label>
            <select name="course" id="course" required>
                @foreach($inscriptions as $inscription)
                    <option value="{{ $inscription->course->id }}">{{ $inscription->course->name }}</option>
                @endforeach
            </select>
        
            <label class="block mb-2 text-sm font-medium text-gray-900">Alumno</label>
            <select name="student" id="student" required>
                @foreach($inscriptions as $inscription)
                    <option value="{{ $inscription->student->id }}">{{ $inscription->student->name }}</option>
                @endforeach
            </select>
            
            <label for="">Comentarios</label>
            <textarea name="comments" id="comments" cols="30" rows="10" readonly></textarea>

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
