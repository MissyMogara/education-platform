<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inscription;

class UserController extends Controller
{
    /**
     * Shows the main page
     */
    public function home()
    {
        return view('main');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->paginate(10);
        return view('dashboard', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createTeacher()
    {
        $option = "teacher";
        return view('private.users.create', compact('option'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createStudent()
    {
        $option = "student";
        return view('private.users.create', compact('option'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        if ($request->last_name) {
            $user->last_name = $request->last_name;
        }
        $user->email = $request->email;
        $user->dni = $request->dni;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        if ($request->phone) {
            $user->phone = $request->phone;
        }
        if ($request->address) {
            $user->address = $request->address;
        }
        if ($request->city) {
            $user->city = $request->city;
        }
        if ($request->specialty) {
            $user->specialty = $request->specialty;
        }
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Usuario creado con éxisto');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('public.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('private.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        if ($request->last_name) {
            $user->last_name = $request->last_name;
        }
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        if ($request->phone) {
            $user->phone = $request->phone;
        }
        if ($request->address) {
            $user->address = $request->address;
        }
        if ($request->city) {
            $user->city = $request->city;
        }
        if ($request->specialty) {
            $user->specialty = $request->specialty;
        }
        $user->update();

        return redirect()->route('dashboard')->with('success', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $inscriptions = Inscription::where('status', 'confirmed')->exists();

        if ($inscriptions) {
            return redirect()->route('dashboard')->with('error', 'No se puede eliminar un usuario que tiene inscripciones confirmadas');
        }
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'Usuario eliminado con éxito');
    }
}
