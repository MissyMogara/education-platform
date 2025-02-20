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
            @if (Auth::user() && (Auth::user()->isTeacher() || Auth::user()->isAdmin()))
                    <div>
                        <h3 class="text-1xl mb-2">Alumnos inscritos</h3>
                        <hr>
                        <ul>
                            @foreach ($inscriptions as $inscription)
                                <li class="flex mb-5 mt-5">
                                    <div class="flex mt-6 me-1">
                                        <p>
                                            {{ $inscription->student->name }}
                                        </p>
                                    </div>
                                    <div>
                                        <form action="{{ route('private.evaluation.store') }}" method="POST" class="flex">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="student_id" value="{{ $inscription->student_id }}">
                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                            <div class="flex">
                                                <div>
                                                    <div>
                                                        <label for="finalGrade">Nota final:</label>
                                                    </div>
                                                    <div>
                                                        <input type="number" name="finalGrade" class="text-black">
                                                    </div>
                                                </div>
                                                <div class="ms-1">
                                                    <div>
                                                        <label for="comments" class="mt-1">Comentarios:</label>
                                                    </div>
                                                    <div>
                                                        <textarea name="comments" id="" cols="30" rows="1" class="text-black" style="resize: none;"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <input type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-6 ms-1" value="Enviar evaluación">
                                            </div>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            @endif
            <div class="flex justify-center items-center">
            @if (Auth::user() && Auth::user()->isStudent())
                <x-buttons.to-enroll-button 
                label="Inscribirse" 
                route="public.course.enroll" 
                :course="$course->id"  
                :student="Auth::user()->id ?? null" 
                />
            @endif
            <div class="ms-2">
                <x-buttons.link-to-button  route="public.course.index" label="Volver"/>
            </div>
            </div>
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