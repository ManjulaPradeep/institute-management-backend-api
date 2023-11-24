<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use PhpParser\Node\Stmt\TryCatch;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Student::all();
        // 
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
            $student = Student::create($request->validated());

            if ($student) {
                return response()->json(['message' => 'Student created successfully','Data' => $student],200);
            } else {
                return response()->json(['message' => 'Failed to create the student','Data' => null],500);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to create the student : '.$th->getMessage(), 'Data' => null],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
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
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }






        // // Retrieve all students
        // public function index()
        // {
        //     return Student::all();
        // }
    
        // // Retrieve a single student by ID
        // public function show($id)
        // {
        //     return Student::findOrFail($id);
        // }
    
        // // Create a new student
        // public function store(Request $request)
        // {
        //     return Student::create($request->all());
        // }
    
        // // Update a student by ID
        // public function update(Request $request, $id)
        // {
        //     $student = Student::findOrFail($id);
        //     $student->update($request->all());
        //     return $student;
        // }
    
        // // Delete a student by ID
        // public function destroy($id)
        // {
        //     $student = Student::findOrFail($id);
        //     $student->delete();
        //     return response()->json(['message' => 'Student deleted successfully']);
        // }
}
