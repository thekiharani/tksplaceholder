<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PeopleResource;
use App\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $people = People::latest()->paginate(10);
        return PeopleResource::collection($people);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:people',
            'phone_number' => 'required|string|max:20|unique:people',
        ]);
        $people = new People;
        $people->name = $request->name;
        $people->email = $request->email;
        $people->phone_number = $request->phone_number;
        $people->save();
        return response()->json(['message' => 'Resource Created','created' => $people], 201);
    }

    // Display the specified resource.
    public function show(People $people)
    {
        return new PeopleResource($people);
    }

    // Update the specified resource in storage.
    public function update(Request $request, People $people)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:people, name' . $people->id,
            'phone_number' => 'required|string|max:20|unique:people, name' . $people->id,
        ]);
        $people->name = $request->name;
        $people->email = $request->email;
        $people->phone_number = $request->phone_number;
        $people->save();
        return response()->json(['message' => 'Resource Updated', 'updated' => $people], 200);
    }

    // Remove the specified resource from storage.
    public function destroy(People $people)
    {
        $people->delete();
        return response()->json(['message' => 'Resource Deleted'], 204);
    }
    
}
