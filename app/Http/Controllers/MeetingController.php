<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Http\Requests\StoreMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;
use App\Models\Supplier;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.tasks_meeting.index', ['meetings' => Meeting::with('supplier')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.tasks_meeting.create', ['suppliers' => Supplier::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMeetingRequest $request)
    {
        // dd($request->all());
        Meeting::create($request->all());
        return redirect()->route('meeting.index')->with(['msg' => 'Meeting created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMeetingRequest $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return redirect()->route('meeting.index')->with(['msg' => 'Meeting deleted successfully', 'alert' => 'alert-fail']);
    }
}
