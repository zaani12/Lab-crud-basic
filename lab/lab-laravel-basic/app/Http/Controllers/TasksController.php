<?php

namespace App\Http\Controllers;
use App\Models\Tasks;
use Illuminate\Http\Request;
use App\Models\Projects;
class TasksController extends Controller
{
    public function index(){
        $tasks = tasks::paginate(3);
        return view('home',compact('tasks'));
    }
    public function create(){
        $projects = projects::all();
        return view('add',compact('projects'));
    }
    public function store(Request $request){
        $task = new tasks;
        $validatedData = $request->validate([
            'nom' => 'required | max:50',
            'projetId' => 'required',
            'description' => 'required'
        ]);
        $task::create($validatedData);
         return redirect()->route('add.task')->with('success' , 'tache a été ajouter avec succés');

    }
    public function edit($id){
        $task = tasks::findOrFail($id);
        $projects = Projects::all();
        return view('edit' , compact('task' , 'projects'));
    }
    public function update(Request $request , $id){
        $task = tasks::findOrFail($id);
        $validatedData = $request->validate([
            'nom' => 'required | max:50',
          'projetId' => 'required',
          'description' => 'required'
        ]);
        $task->update($validatedData);
        return redirect()->route('edit.task' , ['id' => $task->id])->with('success' , 'tache a été modifier avec succés');
    }
    public function destroy($id){
        $task = Tasks::findOrFail($id);
        $task->delete();
        $tasks = Tasks::paginate(3);
        return view('home' , compact('tasks'));
    }

}

