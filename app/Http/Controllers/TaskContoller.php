<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:25|string',
            'description' => 'nullable|max:100|string',
            'price' => 'numeric'
        ]);

        $task = Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $task = Task::find($id);
       if(!$task) {
           return response()->json(['error' => 'Task Not Found'], 404);
       }
       return response()->json($task, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $task = Task::find($id);
       if(!$task) {
           return response()->json(['error' => 'Task Not Found'], 404);
       }
       return response()->json($task, 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $task = Task::find($task);
        if(!$task) {
        return response()->json(['error' => 'Task Not Found'], 4o4);
        }
        $task->delete();
        return response()->json(['message' => 'Task Deleted Successfully'], 200);
    }
}
