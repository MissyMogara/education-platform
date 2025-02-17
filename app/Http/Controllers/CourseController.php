<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Shows all the courses
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            $courses = Course::all()->paginate(10);
            return view('dashboard', compact('courses'));
        } else if ($user->role === 'teacher') {
            $courses = Course::where('teacher_id', $user->id)->paginate(10);
            return view('public.courses.index', compact('courses'));
        } else if ($user->role === 'student') {
            $courses = Course::with(['teacher', 'category'])->where('status', 'active')->paginate(10);
            return view('public.courses.index', compact('courses'));
        }
    }

    // Método para mostrar un curso específico
    public function show($id)
    {
        $course = Course::with(['teacher', 'category'])->where('id', $id)->first();
        if (!$course) {
            abort(404);
        }
        return view('public.courses.show', compact('course'));
    }


    // Método para crear un nuevo curso
    public function create()
    {
        return view('private.courses.create');
    }

    // Método para almacenar un nuevo curso
    public function store(Request $request)
    {
        //
    }

    // Método para editar un curso existente
    public function edit($id)
    {
        //
    }

    // Método para actualizar un curso existente
    public function update(Request $request, $id)
    {
        //
    }

    // Método para eliminar un curso
    public function destroy($id)
    {
        //
    }
}
