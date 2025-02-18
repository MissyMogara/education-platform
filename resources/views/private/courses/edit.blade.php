<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>

    <div class="p-4 flex justify-center">
        <x-form.form ruta="{{ route('private.course.update', ['id' => $course->id]) }}" nombre="Editar Curso" metodo="put">
            <x-form.input tipo="text" nombre="name" id="name" label="Nombre del curso" required="required" valor="{{$course->name}}"/>
            <x-form.input tipo="text" nombre="description" id="description" label="Descripción" required="required" valor="{{$course->description}}" />
            <label class="block mb-2 text-sm font-medium text-gray-900">Categoria</label>
            <select name="category" id="category" required>
                @foreach($categories as $category)
                    @if ($category->id == $course->category_id)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>

            @if (Auth::user()->isTeacher())
                <input type="hidden" name="teacher" id="teacher" value="{{ Auth::user()->id }}">
            @else
                
                <label class="block mb-2 text-sm font-medium text-gray-900">Profesor</label>
                <select name="teacher" id="teacher" required>
                    @foreach($teachers as $teacher)
                        @if ($teacher->id == $course->teacher_id)
                            <option value="{{ $teacher->id }}" selected>{{ $teacher->name }}</option>
                        @else
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endif
                    @endforeach
                </select>
            @endif

            <x-form.input tipo="number" nombre="duration" id="duration" label="Duración" required="required" valor="{{$course->duration}}" />
            <select name="status" id="status" required>
                @if ($course->status == 'active')
                    <option value="active" selected>Activo</option>
                @else
                    <option value="active">Activo</option>
                @endif

                @if ($course->status == 'finished')
                    <option value="finished" selected>Finalizado</option>
                @else
                    <option value="finished">Finalizado</option> 
                @endif

                @if ($course->status == 'paused')
                    <option value="paused" selected>Pausado</option>
                @else
                    <option value="paused">Pausado</option> 
                @endif
            </select>

            <div class="flex justify-center items-center">
                <div>
                    <x-buttons.save-button />
                </div>
                <div class="ms-2 mt-2">
                    <x-buttons.link-to-button route="public.course.index" label="Volver" />
                </div>
            </div>
        </x-form.form>
    </div>

    <x-slot name="footer">
        {{ __('Mogara') }}
    </x-slot>
</x-app-layout>
