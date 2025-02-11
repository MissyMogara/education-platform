<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    // Método para mostrar todos los cursos
    public function index(User $user)
    {
        if ($user->role === 'admin') {
            $courses = Course::all();
            return view('dashboard', compact('courses'));
        } else if ($user->role === 'teacher') {
            $courses = Course::where('teacher_id', $user->id)->get();
            return view('dashboard', compact('courses'));
        } else if ($user->role === 'student') {
            // $inscriptions = $user->inscriptions()->get()->pluck('course_id'); // Get all courses id
            // $courses = Course::whereIn('id', $inscriptions)->get(); // Get all courses with ids in $inscriptions array
            return view('public.courses.index', compact('courses'));
        }
    }

    // Método para mostrar un curso específico
    public function show($id)
    {
        //
    }

    // Método para crear un nuevo curso
    public function create()
    {
        //
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
