<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    protected $tasks;
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware("auth");
        $this->tasks = $tasks;
    }
    /**
     * タスク一覧表示
     * 
     * @param Request $request
     * @return \Illuminate\Contracts\View\View\Illuminate\Contracts\View\Factory
     */
    public function index(Request $request){
        $tasks = $this->tasks->forUser($request->user());
        return view("tasks.index",compact("tasks"));
    }

    /**
     * タスク作成
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request){
        $validated = $request->validate([
            
            "name" => "required|string|max:100",
        ]);

        $task = $request->user()->tasks()->create([
            "name" => $validated["name"],
        ]);

        return redirect('/tasks');
    }

    public function delete($taskId){
        $task=Task::find($taskId);
        $this->authorize('delete',$task);
        $task->delete();
        return redirect('/tasks');
    }


}
    
