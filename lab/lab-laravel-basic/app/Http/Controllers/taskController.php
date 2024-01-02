<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Tasks = Task::paginate(3);
        return view('Tasks.index', compact('Tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Projects = Project::all();
        return view('Tasks.create', compact('Projects'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Validation = $request->validate([
            'name' => 'required|string|max:50',
            'description' => '',
            'project_id' => 'required'
        ]);
        // dd($Validation);
        Task::create($Validation);
        return redirect('/');
    }

    public function show(string $id)
    {
        return 'this ' . $id;

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Task = Task::find($id);
        $Projects = Project::all();
        return view('Tasks.edit', compact('Task', 'Projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Validation = $request->validate([
            'name' => 'required|string|max:50',
            'description' => '',
            'project_id' => 'required'
        ]);
        // dd($Validation);
        Task::where('id', $id)->update($Validation);
        return redirect('/');
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task::where('id', $id)->delete();
        return redirect('/');

    }
}