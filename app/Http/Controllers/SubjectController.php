<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Requests\Subject\StoreSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;
use App\Http\Requests\Subject\SubjectRequest;
use App\Http\Resources\SubjectResource;
use Illuminate\Support\Facades\DB;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subject = Subject::all();
        return response()->json([
            'data' => [
                'subjects' => SubjectResource::collection($subject)
            ]
        ], 200);
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
    public function store(StoreSubjectRequest $request)
    {
        try {
            $subject = Subject::create([
                'name' => $request->input('name'),
            ]);

            return response()->json(['message' => 'Subject created successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to create the subject',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SubjectRequest $subject, $subjectID)
    {
        $subject = Subject::find($subjectID);

        if (!$subject) {
            return response()->json(['message' => 'Lecturer not found'], 400);
        }

        $subjectResours = new SubjectResource($subject);
        return response()->json([
            'data' => [
                'subject' =>  $subjectResours
            ]
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
public function update(UpdateSubjectRequest $request, $subjectID)
{
    $subject = Subject::where('subject_id', $subjectID)->first();

    if ($subject) {
        try {
            // $subject->update($request->validated());
            DB::update('UPDATE subjects SET name = ? WHERE subject_id = ?', [$request->input('name'), $subjectID]);


            return response()->json(['message' => 'Subject updated successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Failed to update the Subject: ' . $th->getMessage()], 500);
        }
    } else {
        return response()->json(['message' => 'Subject not found'], 404);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjectRequest $subject, $subjectID)
    {
        $subject = Subject::find($subjectID);

        if (!$subject) {
            return response()->json(['message' => 'Subject not found'], 404);
        }

        $subject->delete();
        return response()->json(['message' => 'Subject deleted'], 204);
    }
}
