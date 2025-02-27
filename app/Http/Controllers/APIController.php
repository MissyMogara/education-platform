<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;
use App\Models\Inscription;

class APIController extends Controller
{
    /**
     * Return a token that can be used
     */
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user->role === 'student') {
            return response()->json([
                'message' => 'Los alumnos no pueden usar la API',
            ], 401);
        }

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Inicio de sesión exitoso',
                'token' => $token,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Correo electrónico o contraseña incorrectos'
            ], 401);
        }
    }

    /**
     * Return all courses with pagination and filtering by category and state
     */
    public function getCourses(Request $request)
    {

        $query = Course::query();

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('state')) {
            $query->where('state', $request->state);
        }

        $courses = $query->paginate(10);
        return response()->json($courses);
    }

    /**
     * Return a course by id
     */
    public function getCoursesById($id)
    {
        $course = Course::find($id);
        return response()->json($course);
    }

    /**
     * Return all inscriptions by student
     */
    public function getInscriptionsByStudent($dni)
    {

        $user = User::where('dni', $dni)->first();

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $inscriptions = Inscription::where('student_id', $user->id)->get();

        if ($inscriptions->isEmpty()) {
            return response()->json(['message' => 'No se encontraron inscripciones'], 404);
        }

        return response()->json($inscriptions);
    }

    /**
     * Creates a new inscription for a student
     */
    public function enrollStudent()
    {
        $student = User::find(request('student_id'));

        if (!$student) {
            return response()->json(['message' => 'Estudiante no encontrado'], 404);
        }

        if ($student->role !== 'student') {
            return response()->json(['message' => 'El usuario no es un estudiante'], 400);
        }

        $inscription = Inscription::create([
            'course_id' => request('course_id'),
            'student_id' => request('student_id'),
            'status' => 'confirmed', // If you use the API that means that the inscription is confirmed
        ]);

        return response()->json($inscription, 201);
    }

    /**
     * Change the status of the inscription to cancelled status
     */
    public function unenrollStudent($id)
    {
        $inscription = Inscription::find($id);

        if (!$inscription) {
            return response()->json(['message' => 'Inscripción no encontrada'], 404);
        }

        $inscription->status = 'cancelled';
        $inscription->save();

        return response()->json(['message' => 'Inscripción cancelada'], 200);
    }

    /**
     * Create a course
     */
    public function createCourse(Request $request)
    {
        $course = Course::create($request->all());
        return response()->json($course, 201);
    }

    /**
     * Delete a course with all the inscriptions
     */
    public function deleteCourse($id)
    {
        $course = Course::find($id);

        if (!$course) {
            return response()->json(['message' => 'Curso no encontrado'], 404);
        }

        $course->delete();

        return response()->json(['message' => 'Curso eliminado'], 200);
    }
}
