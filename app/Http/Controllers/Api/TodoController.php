<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TodoResource;
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $todos = Todo::latest('created_at')->paginate(20);
        return TodoResource::collection($todos);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
        ]);
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->completed = false;
        $todo->save();
        return response()->json(['message' => 'Resource Created','created' => $todo], 201);
    }

    // Display the specified resource.
    public function show(Todo $todo)
    {
        return new TodoResource($todo);
    }

    // Update the specified resource in storage.
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|string',
        ]);
        $todo->title = $request->title;
        $todo->save();
        return response()->json(['message' => 'Resource Updated','updated' => $todo], 200);
    }

    // Update the specified resource in storage.
    public function toggleComplete(Todo $todo)
    {
        $todo->completed = !$todo->completed;
        $todo->save();
        return response()->json(['message' => 'Resource Updated','updated' => $todo], 200);
    }

    // Remove the specified resource from storage.
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(['message' => 'Resource Deleted'], 204);
    }
    
}
