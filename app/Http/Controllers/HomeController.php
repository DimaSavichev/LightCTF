<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

function isSolved($task,$user){
    $ok = false;
    $tasks = $user->tasks;
    foreach ($tasks as $solvedTask){
        if ($task->id == $solvedTask->id){
            $ok = true;
        }
    }
    return $ok;
}
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = Task::all();
        $user = Auth::user();
        $solvedTasks = [];
        $unsolvedTasks = [];
        foreach ($tasks as $task){
            if (isSolved($task,$user)){
                array_push($solvedTasks,$task);
            } else {
                array_push($unsolvedTasks,$task);
            }
        }
        return view('home',compact('solvedTasks','unsolvedTasks','user'));
    }

    public function checkTask(Request $request)
    {
        $answer = $request->answer;
        $task_id = $request->task_id;
        $task = Task::findOrFail($task_id);
        $user = Auth::user();
        if ($answer == $task->flag){
            $user->tasks()->attach($task_id);
        }
        return redirect('/home');
    }
}
