<?php

namespace App\Http\Controllers;

use App\Models\StParent;
use App\Http\Requests\Parent\StoreStParentRequest;
use App\Http\Requests\Parent\UpdateStParentRequest;
use App\Http\Requests\Parent\ParentRequest;
use App\Http\Resources\StParentResource;

class StParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parents = StParent::all();

        return response()->json([
            'data' => [
                'parents' => StParentResource::collection($parents)
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
    public function store(StoreStParentRequest $request)
    {
        try {
            $parent = StParent::create([
                'name' => $request->input('name'),
                'contact' => $request->input('contact'),
                'email' => $request->input('email')
            ]);

            return response()->json(['message' => 'Parent created successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Failed to create the parent',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ParentRequest $stParent, $parentID)
    {
        $parent = StParent::find($parentID);

        if (!$parent) {
            return response()->json(['message' => 'Course not found'], 400);
        }

        $parentResource = new StParentResource($parent);
        return response()->json([
            'data' => [
                'lecturer' =>  $parentResource
            ]
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StParent $stParent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStParentRequest $request, $parentID)
    {
        $parent = StParent::where('id', $parentID)->first();
        if ($parent) {
            try {
                $parent->update($request->validated());

                return response()->json(['message' => 'Parent updated successfully'], 200);
            } catch (\Throwable $th) {
                // Log::error('Error at updating lecturer' . $th->getMessage());
                return response()->json(['message' => 'Failed to update the parent: ' . $th->getMessage()], 500);
            }
        } else {
            return response()->json(['message' => 'Parent not found'], 404);
        }    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParentRequest $stParent, $parentID)
    {
        $parent = StParent::find($parentID);

        if(!$parent){
            return response()->json(['message' => 'Parent not found'], 404);
        }

        $parent->delete();
        return response()->json(['message' => 'Parent deleted'],204);
    }
}
