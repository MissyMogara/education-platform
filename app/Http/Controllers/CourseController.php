<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
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

    /**
     * Redirect to create form
     */
    public function show($id)
    {
        $course = Course::with(['teacher', 'category'])->where('id', $id)->first();
        if (!$course) {
            abort(404);
        }
        return view('public.courses.show', compact('course'));
    }


    /**
     * Create a new Course
     */
    public function create()
    {
        $user = Auth::user();
        $categories = Category::all();
        if ($user->role === 'admin') {
            $teachers = User::where('role', 'teacher')->all();
            return view('private.courses.create', compact('teachers', 'categories'));
        }
        return view('private.courses.create', compact('categories'));
    }

    /**
     * Store a course into the database
     */
    public function store(Request $request)
    {
        $course = new Course();
        $course->name = $request->name;
        $course->description = $request->description;
        $course->category_id = $request->category;
        $course->teacher_id = $request->teacher;
        $course->duration = $request->duration;
        $course->status = $request->status;

        $course->save();
        return redirect()->route('public.course.index')->with('success', 'El curso ha sido creado correctamente.');
    }

    /**
     * Redirect to edit form
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $categories = Category::all();
        $teachers = User::where('role', 'teacher')->get();
        return view('private.courses.edit', compact("course", "categories", "teachers"));
    }

    /**
     * Updates a course
     */
    public function update(Request $request, $id)
    {

        $course = Course::find($id);
        if (!$course) {
            abort(404);
        }
        $course->name = $request->name;
        $course->description = $request->description;
        $course->category_id = $request->category;
        $course->teacher_id = $request->teacher;
        $course->duration = $request->duration;
        $course->status = $request->status;

        $course->update();
        return redirect()->route('public.course.index')->with('success', 'El curso ha sido actualizado correctamente.');
    }

    /**
     * Delete a course
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if (!$course) {
            abort(404);
        }
        $course->delete();
        return redirect()->route('public.course.index')->with('success', 'El curso ha sido eliminado correctamente.');
    }
}
