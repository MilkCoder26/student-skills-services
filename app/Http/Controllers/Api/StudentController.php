<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::get();

        if($students->count() > 0) {
            return StudentResource::collection($students);
        }
        else {
            return response()->json([
                'message' => 'No record available',
            ], 200);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'classe' => 'required|string|max:255',
            'niveau' => 'required|integer',
            'competence' => 'required|string|max:255',
            'sexe' => 'required|string|max:10',
            'skills' => 'nullable|array',
            'email' => 'required|email|max:255|unique:students,email',
            'phone_number' => 'nullable|string|max:15',
            'bio' => 'nullable|string|max:500',
        ]);

        $student = Student::create([
            'name' => $request->name,
            'classe' => $request->classe,
            'niveau' => $request->niveau,
            'competence' => $request->competence,
            'sexe' => $request->sexe,
            'skills' => $request->skills,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'bio' => $request->bio,
        ]);

        return response()->json([
            'message' => 'Student created successfully',
            'data' => new StudentResource($student),
        ], 201);
    }

    public function show(Student $student)
    {
        return new StudentResource($student);
    }

    public function update(Student $student, Request $request)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'classe' => 'sometimes|required|string|max:255',
            'niveau' => 'sometimes|required|integer',
            'competence' => 'sometimes|required|string|max:255',
            'sexe' => 'sometimes|required|string|max:10',
            'skills' => 'nullable|array',
            'email' => 'sometimes|required|email|max:255|unique:students,email,' . $student->id,
            'phone_number' => 'nullable|string|max:15',
            'bio' => 'nullable|string|max:500',
        ]);

        $student->update([
            'name' => $request->name,
            'classe' => $request->classe,
            'niveau' => $request->niveau,
            'competence' => $request->competence,
            'sexe' => $request->sexe,
            'skills' => $request->skills,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'bio' => $request->bio,
        ]);

        return response()->json([
            'message' => 'Student updated successfully',
            'data' => new StudentResource($student),
        ], 200);
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'message' => 'Student deleted successfully',
        ], 200);
    }
}