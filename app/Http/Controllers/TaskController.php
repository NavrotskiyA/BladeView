<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequestValidator;
use App\Models\Task\Status;
use App\Models\Task\Task;
use App\Models\User;
use App\Services\TaskHistory\TaskHistory;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Collection;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|string
     */
    public function index()
    {
        $tasks = Task::query()->paginate(10);
        return view('task.task-list',['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|string
     */
    public function create()
    {
        return view('task.form.create',[
            'statuses' => Status::query()->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TaskRequestValidator $task
     * @return \Illuminate\Http\Response|string
     */
    public function store(TaskRequestValidator $task)
    {
        $newTask = new Task();
        $newTask->setParams($task->toArray());
        $newTask->creator_id = 1;
        $newTask->save();
        return view('task.task',['task' => $newTask, 'new' => 1]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function show($id)
    {
        $task = Task::query()->where('id', $id)->first();
        return view('task.task',['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function edit($id)
    {
        /** @var Collection $statuses */
        $statuses = Status::query()->get();
        $task = Task::query()->where('id', $id)->first();
        return view('task.form.edit',[
            'statuses' => $statuses,
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function update(TaskRequestValidator $task, $id)
    {
        $newTask = Task::query()->where('id', $id)->first();
        $newTask->setParams($task->all());
        $newTask->save();
        return view('task.task',['task' => $newTask]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|string
     */
    public function destroy($id)
    {
        $task = Task::query()->where('id', $id)->delete();
        return redirect(route('task.index'));
    }
}
