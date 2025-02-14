<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Models\Inscription;

class InscriptionController extends Controller
{
    /**
     * Method to enroll students in courses
     */
    public function enroll($courseId, $studentId = null)
    {
        if (is_null($studentId)) {
            $studentId = Auth::user()->id;
        }

        $course = Course::find($courseId);

        // Check if course exists
        if (!$course) {
            return redirect()->back()->with('error', 'Curso no encontrado');
        }

        //Check if the student already is enrolled
        $inscriptionExists = Inscription::where('course_id', $courseId)
            ->where('student_id', $studentId)
            ->exists();


        if ($inscriptionExists) {
            return redirect()->back()->with('error', 'El alumno ya esta registrado en este curso');
        }

        // Enroll the student in the course
        $course->inscriptions()->create(['student_id' => $studentId]);

        Inscription::create([
            'course_id' => $courseId,
            'student_id' => $studentId,
            'status' => 'pending',
        ]);
        return redirect()->route('public.course.index');
    }
}
