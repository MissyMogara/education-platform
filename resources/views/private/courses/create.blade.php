<x-app-layout>
   
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>
    <div class="p-4">
        <x-form.form nombre="Crear curso" ruta="private.course.store">
            <x-input type="text" name="name" id="name" placeholder="{{ __('Nombre del curso') }}" />
            <x-input type="text" name="description" id="description" placeholder="{{ __('Descripción del curso') }}" />
            <select name="category" id="category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @if (Auth::user()->isTeacher())
                <x-input type="hidden" name="teacher" id="teacher" value="{Auth::user()->id}"/>
            @endif

        </x-form.form>
    </div>
    <x-slot name="footer">
        {{ __('Mogara') }}
    </x-slot>
</x-app-layout>