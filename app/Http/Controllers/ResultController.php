<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Http\Requests\Result\StoreResultRequest;
use App\Http\Requests\Result\UpdateResultRequest;
use App\Http\Requests\Result\ResultRequest;
use App\Http\Resources\ResultResource;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Result::all();

        return response()->json([
            'data' => [
                'results' => ResultResource::collection($results)
            ]
        ]);

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
    public function store(StoreResultRequest $request)
    {
        try {
            $result = Result::create([
                'marks' => $request->input('marks'),
                'grade' => $request->input('grade')
            ]);

            return response()->json(['message' => 'Result created successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to create the Result',
                'error' => $th->getMessage()
            ], 500);
        }    }

    /**
     * Display the specified resource.
     */
    public function show(ResultRequest $result,$resultID)
    {
        $Result = Result::find($resultID);

        if (!$Result) {
            return response()->json(['message' => 'Result not found'], 400);
        }

        $resultResouce = new ResultResource($Result);
        return response()->json([
            'data' => [
                'result' =>  $resultResouce
            ]
        ], 200);    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResultRequest $request, $resultID)
    {
        $result = Result::where('id', $resultID)->first();

        if ($result) {
            try {
                $result->update($request->validated());
    
                return response()->json(['message' => 'Result updated successfully'], 200);
            } catch (\Throwable $th) {
                return response()->json(['message' => 'Failed to update the Result: ' . $th->getMessage()], 500);
            }
        } else {
            return response()->json(['message' => 'Result not found'], 404);
        }    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ResultRequest $result, $resultID)
    {
        $result = Result::find($resultID);

        if (!$result) {
            return response()->json(['message' => 'Result not found'], 404);
        }

        $result->delete();
        return response()->json(['message' => 'Result deleted'], 204);    }
}
