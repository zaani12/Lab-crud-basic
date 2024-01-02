<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Http\Requests\FormTaskRequest;

class TaskController extends Controller
{
    

    public function index(Request $request)
    {

        $Projects = Project::all();

        $Tasks = Task::with('project')->paginate(4);

        if ($request->ajax()) {
            $query = Task::query();
            $Search = $request->get('searchTaskValue');
            $Filter = $request->get('selectProjrctValue');
            $Search = str_replace(' ', '%', $Search);

            // pagination
            if (empty($Search) && $Filter === "tous les projets") {
                return view('Task.Search', compact('Tasks', 'Projects'));
            }
            // search
            if ($Search) {
                $Tasks = $query->with('project')->where('name', 'like', '%' . $Search . '%')->paginate(4);
            }
            // filter
            if ($Filter !== "tous les projets") {
                $Tasks = $query->where('project_id', $Filter)->paginate(4);
            }
            return view('Task.Search', compact('Tasks', 'Projects'))->render();
        }

        return view('Task.index', compact('Tasks', 'Projects'));


    }

    public function show(Task $task)
    {
        $Projects = Project::all();
        return view('Task.show', compact('task', 'Projects'));
    }


    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Projects = Project::all();
        return view('Task.creat', compact('Projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormTaskRequest $request)
    {
        // dd($request->validated());
        Task::create($request->validated());
        return redirect('/')->with('success', 'Tâche créée avec succès !');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $Projects = Project::all();

        return view('Tasks.edit', compact('task', 'Projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormTaskRequest $request, Task $task)
    {
        // dd($task);
        $task->update($request->validated());
        return redirect('/')->with('success', 'Tâche update avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/')->with('success', 'Tâche delete avec succès !');
    }
}