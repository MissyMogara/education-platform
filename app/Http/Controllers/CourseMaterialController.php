<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseMaterial;

class CourseMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $course = Course::find($id);
        return view('private.materials.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $courseMaterial = new CourseMaterial;
        $courseMaterial->course_id = $request->course_id;
        $courseMaterial->type = $request->type;
        $courseMaterial->url = $request->url;
        $courseMaterial->save();
        return redirect()->route('public.course.index')->with('success', 'Material agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $courseMaterial = CourseMaterial::find($id);
        if (!$courseMaterial) {
            abort(404);
        }
        $courseMaterial->delete();
        return redirect()->route('public.course.index')->with('success', 'Material eliminado correctamente.');
    }
}
