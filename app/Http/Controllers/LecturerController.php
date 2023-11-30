<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Http\Requests\Lecturer\StoreLecturerRequest;
use App\Http\Requests\Lecturer\UpdateLecturerRequest;
use App\Http\Requests\Lecturer\LecturerRequest;
use App\Http\Resources\LecturerResource;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Lecturer::all();
        $lecturers = Lecturer::all();

        return response()->json([
            'data' => [
                'lecturers' => LecturerResource::collection($lecturers),
            ],
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
    public function store(StoreLecturerRequest $request)
    {
        try {
            $lecturer = Lecturer::create([
                'name' => $request->input('name'),
                'nic' => $request->input('nic'),
                'address' => $request->input('address'),
                'contact' => $request->input('contact'),
                'email' => $request->input('email')
            ]);

            return response()->json(['message' => 'Lecturer created successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to create the lecturer',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LecturerRequest $lecturer, $lecturerID)
    {
        $lecturer = Lecturer::find($lecturerID);

        if (!$lecturer) {
            return response()->json(['message' => 'Course not found'], 400);
        }

        $lecturerResource = new LecturerResource($lecturer);
        return response()->json([
            'data' => [
                'lecturer' =>  $lecturerResource
            ]
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLecturerRequest $request,$lecturerID)
    {
        $lecturer = Lecturer::where('lecturer_id', $lecturerID)->first();
        if ($lecturer) {
            try {
                $lecturer->update($request->validated());

                return response()->json(['message' => 'lecturer updated successfully'], 200);
            } catch (\Throwable $th) {
                Log::error('Error at updating lecturer' . $th->getMessage());
                return response()->json(['message' => 'Failed to update the lecturer: ' . $th->getMessage()], 500);
            }
        } else {
            return response()->json(['message' => 'lecturer not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LecturerRequest $lecturer, $lecturerID)
    {
        $lecturer = Lecturer::find($lecturerID);

        if(!$lecturer){
            return response()->json(['message' => 'Lecturer not found'], 404);
        }

        $lecturer->delete();
        return response()->json(['message' => 'Lecturer deleted'],204);

    }
}
