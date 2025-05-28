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

        if($students) {
            return StudentResource::collection($students);
        }
        else {
            return response()->json([
                'message' => 'No record available',
            ], 200);
        }
    }

    public function store()
    {
        
    }

    public function show()
    {
        
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }
}