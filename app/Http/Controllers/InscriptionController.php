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

    /**
     * Show all inscriptions
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'admin') {

            $inscriptions = Inscription::with(['course', 'student'])->paginate(10);
            return view('private.inscriptions.index', compact('inscriptions'));
        }

        if ($user->role == 'teacher') {
            $courses = Course::where('teacher_id', $user->id)->pluck('id');
            $inscriptions = Inscription::with(['course', 'student'])->whereIn('course_id', $courses)->paginate(10);
            return view('private.inscriptions.index', compact('inscriptions'));
        }
    }

    /**
     * Approves inscriptions
     */
    public function approve($id)
    {
        $inscription = Inscription::find($id);
        if (!$inscription) {
            return redirect()->back()->with('error', 'Inscripción no encontrada');
        }

        $inscription->status = 'confirmed';
        $inscription->save();

        return redirect()->route('private.inscription.index')->with('success', 'Inscripción aprobada');
    }

    /**
     * Rejects inscriptions
     */
    public function reject($id)
    {
        $inscription = Inscription::find($id);
        if (!$inscription) {
            return redirect()->back()->with('error', 'Inscripción no encontrada');
        }

        $inscription->status = 'cancelled';
        $inscription->save();

        return redirect()->route('private.inscription.index')->with('success', 'Inscripción rechazada');
    }

    /**
     * Search by
     */
    public function search(Request $request)
    {
        $query = $request->input('inscription_query');
        $option = $request->input('option');

        $user = Auth::user();

        $inscriptions = Inscription::query();

        if ($user->role == 'teacher') {
            $courses = Course::where('teacher_id', $user->id)->pluck('id');
            $inscriptions->whereIn('course_id', $courses);
        }

        switch ($option) {
            case 'course':
                $inscriptions->whereHas('course', function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%");
                });
                break;
            case 'status':
                $inscriptions->where('status', 'LIKE', "%{$query}%");
                break;
            case 'student':
                $inscriptions->whereHas('student', function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%");
                });
                break;
            default:

                break;
        }

        $inscriptions = $inscriptions->paginate(10);

        return view('private.inscriptions.index', compact('inscriptions'));
    }
}
