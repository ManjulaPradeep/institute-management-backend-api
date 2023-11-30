<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\Course\StoreCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use App\Http\Requests\Course\CourseRequest;
use App\Http\Resources\CourseResource;
use PHPUnit\Framework\Constraint\Count;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();
        return response()->json([
            'data' => [
                'Courses' => CourseResource::collection($courses)
            ]
            ],200);
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
    public function store(StoreCourseRequest $request)
    {
        try {
            $course = Course::create([
                'name' => $request->input('name'),
                'credits' => $request->input('credits'),
                'start' => $request->input('start'),
                'end' => $request->input('end'),
                'no_of_students' => $request->input('no_of_students')
            ]);

            return response()->json(['message' => 'Course created successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to create the course',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseRequest $course,$courseID)
    {
        $course = Course::find($courseID);

        if (!$course) {
            return response()->json(['message' => 'Lecturer not found'], 400);
        }

        $courseResours = new CourseResource($course);
        return response()->json([
            'data' => [
                'lecturer' =>  $courseResours
            ]
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course,$courseID)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, $courseID)
    {
        $course = Course::where('course_id', $courseID)->first();
        if ($course) {
            try {
                $course->update($request->validated());

                return response()->json(['message' => 'Course updated successfully'], 200);
            } catch (\Throwable $th) {
                return response()->json(['message' => 'Failed to update the lecturer: ' . $th->getMessage()], 500);
            }
        } else {
            return response()->json(['message' => 'Course not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseRequest $course,$courseID)
    {
        $course = Course::find($courseID);

        if(!$course){
            return response()->json(['message' => 'Course not found'], 404);
        }

        $course->delete();
        return response()->json(['message' => 'Course deleted'],204);
    }
}
