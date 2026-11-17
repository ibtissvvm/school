<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('index', compact('students'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'section' => 'required',
        'image' => 'nullable|image',
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')
            ->store('students', 'public');
    }

    Student::create($validated);

    return redirect()->route('students.index');

    }

     public function show(Student $student)
    {
        return view('show', compact('student'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}

