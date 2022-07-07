<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use App\Models\Task;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {       
        return view('todos.index');
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(Request $request, ToDo $todo)
    {
        if (request()->is('todos/create'))
        {
            $user = auth()->user();
            $todo_insert = $user->todos()->create($request->only('list_name'));

            return redirect('/todos/create');
        }

        if (request()->is('todos/create/*'))
        {
            if (!empty($request->input('my_day')))
                $my_day = 1;
            else
                $my_day = 0;
            
            if (!empty($request->input('important')))
                $important = 1;
            else
                $important = 0;

            $task = $todo->tasks()->create([
                'description' => $request->input('description'),
                'my_day' => $my_day,
                'important' => $important,
                'reminder' => $request->input('reminder'),
                'due_date' => $request->input('due_date'),
                'repeat' => $request->input('repeat'),
                'note' => $request->input('note'),
                'completed' => 0
            ]);

            return redirect('todos/'.$todo->id);
        }

        
    }

    public function show(ToDo $todo,Request $request)
    {
        $todos = ToDo::where('user_id','=',auth()->id())->get();

        if($request->path() == 'todos/1/myday')
        {
            $tasks = Task::where('my_day','=',1)->where('completed','=','0')->whereIn('to_do_id', $todos->pluck('id'))->latest()->get();
            $completed_tasks = Task::where('my_day','=',1)->where('completed','=','1')->whereIn('to_do_id', $todos->pluck('id'))->latest()->get();
        }
        else if($request->path() == 'todos/2/important')
        {
            $tasks = Task::where('important','=',1)->where('completed','=','0')->whereIn('to_do_id', $todos->pluck('id'))->latest()->get();
            $completed_tasks = Task::where('important','=',1)->where('completed','=','1')->whereIn('to_do_id', $todos->pluck('id'))->latest()->get();
        }
        else if($request->path() == 'todos/3/planned')
        {
            $tasks = Task::whereNotNull('due_date')->where('completed','=','0')->whereIn('to_do_id', $todos->pluck('id'))->latest()->get();
            $completed_tasks = Task::whereNotNull('due_date')->where('completed','=','1')->whereIn('to_do_id', $todos->pluck('id'))->latest()->get();
        }
        else
        {
            $tasks = Task::where('to_do_id','=',$todo->id)->where('completed','=','0')->latest()->get();
            $completed_tasks = Task::where('to_do_id','=',$todo->id)->where('completed','=','1')->latest()->get();
        }

        return view('todos.show', compact('todo','tasks','completed_tasks'));
    }

    public function edit(Task $task)
    {
        return view('todos.edit', compact('task'));
    }

    public function update(Request $request, ToDo $todo, Task $task)
    {
        if (request()->is('todos/*/edit'))
        {
            $todo->update(['list_name' => $request->input('edit_name')]);
            return redirect()->route('todo:create');
        }

        if (request()->is('todos/complete/*'))
        {
            $todo = $request->input('todo_id');
            $task->update(['completed' => 1]);


            return redirect('todos/'.$todo);
        }

        if (request()->is('todos/edit/*'))
        {
            if (!empty($request->input('my_day')))
                $my_day = 1;
            else
                $my_day = 0;
            
            if (!empty($request->input('important')))
                $important = 1;
            else
                $important = 0;
                
            $task->update([
                'description' => $request->input('description'),
                'my_day' => $my_day,
                'important' => $important,
                'reminder' => $request->input('reminder'),
                'due_date' => $request->input('due_date'),
                'repeat' => $request->input('repeat'),
                'note' => $request->input('note'),
            ]);

            return redirect('todos/'.$task->to_do_id);
        }
    }

    public function delete(ToDo $todo,Task $task)
    {
        if(!empty($todo))
        {
            $todo->delete();

            return redirect()->route('todo:create');
        }

        if(!empty($task))
        {
            $todo = $task->to_do_id;
            $task->delete();

            return redirect()->route('todo:show', $todo);
        }
    }
}
