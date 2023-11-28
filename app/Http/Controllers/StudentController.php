<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\Student\StoreStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Http\Requests\Student\StudentRequest;
use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Student::all();
        return StudentResource::collection(Student::all());
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
    public function store(StoreStudentRequest $request)
    {
        try {
            $student = Student::create([
                'name' => $request->input('name'),
                'reg_no' => $request->input('regNo'),
                'nic' => $request->input('nic'),
                'address' => $request->input('address'),
                'contact' => $request->input('contact'),
                'email' => $request->input('email'),
            ]);

            return response()->json([
                'message' => 'Student created successfully',
            ], 201);
        } catch (\Throwable $th) {
            Log::error('Failed to create a student: ' . $th->getMessage());

            return response()->json([
                'message' => 'Failed to create the student',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentRequest  $student, $studentID)
    {
        $student = Student::where('student_id', $studentID)->first();

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 400);
        }

        $studentResource = new StudentResource($student);

        return response()->json(['data' => $studentResource], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, $studentID)
    {
        $student = Student::where('student_id', $studentID)->first();

        if ($student) {
            try {
                $student->update($request->validated());

                return response()->json(['message' => 'Student updated successfully'], 200);
            } catch (\Throwable $th) {
                Log::error('Error at updating student' . $th->getMessage());
                return response()->json(['message' => 'Failed to update the student: ' . $th->getMessage()], 500);
            }
        } else {
            return response()->json(['message' => 'Student not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentRequest $request, $studentID)
    {
        $student = Student::where('student_id', $studentID)->first();

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        
        $student->delete();
        return response()->json(['message' => 'Student deleted'],204);
    }
}
