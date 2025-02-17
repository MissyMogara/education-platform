<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            // Display all evaluations
            $evaluations = Evaluation::with(['course', 'student'])->paginate(10);
            return view('public.evaluations.index', compact('evaluations'));
        }
        if ($user->role === 'teacher') {
            // Display evaluations for the current teacher
            $courses = Course::where('teacher_id', $user->id)->pluck('id');
            $evaluations = Evaluation::with(['course', 'student'])->whereIn('course_id', $courses)->paginate(10);
            return view('public.evaluations.index', compact('evaluations'));
        }
        if ($user->role === 'student') {
            // Display evaluations for the current student
            $evaluations = Evaluation::with(['course', 'student'])->where('student_id', $user->id)->paginate(10);
            return view('public.evaluations.index', compact('evaluations'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evaluation = Evaluation::with(['course', 'student'])->findOrFail($id);
        if (!$evaluation) {
            abort(404);
        }
        return view('public.evaluations.show', compact('evaluation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
