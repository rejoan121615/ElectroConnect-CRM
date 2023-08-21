<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Http\Requests\StoreTasksRequest;
use App\Http\Requests\UpdateTasksRequest;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.tasks.index', ['incomplete' => Tasks::where('complete',0)->get(),
         'complete' => Tasks::where('complete', 1)->get()]);
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
    public function store(StoreTasksRequest $request)
    {
        // dd($request->all());
        Tasks::create(['user_id' => null, 'description' => $request->input('description'), 'complete' => false]);
        return view('pages.tasks.index', [
            'incomplete' => Tasks::where('complete', 0)->get(),
            'complete' => Tasks::where('complete', 1)->get()
        ])->with('msg', 'Task created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTasksRequest $request, Tasks $task)
    {
        // dd($task->getAttributes());
        $task->update(['complete' => true]);
        return view('pages.tasks.index', [
            'incomplete' => Tasks::where('complete', 0)->get(),
            'complete' => Tasks::where('complete', 1)->get()
        ])->with('msg', 'Task marked as complete');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $tasks)
    {
        //
    }
}
