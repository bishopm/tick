<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Repositories\TasksRepository;
use App\Repositories\UsersRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * @var TaskRepository
     */
    private $task;
    private $user;

    public function __construct(TasksRepository $task, UsersRepository $user)
    {
        $this->task = $task;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        return $this->task->all();
    }

    public function mytasks($id)
    {
        return $this->user->mytasks($id);
    }

    public function myunallocated($id)
    {
        return $this->user->myunallocated($id);
    }

    public function show($id)
    {
        return Task::with('project', 'users')->find($id);
    }

    public function toggle($id)
    {
        $task=Task::with('project')->find($id);
        if ($task->done == "yes") {
            $task->done = "no";
        } else {
            $task->done = "yes";
        }
        $task->save();
        return "Toggled";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $task = $this->task->create($request->except('users'));
        $task->users()->sync($request->users);
        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Task $task
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $task = $this->task->find($id);
        $this->task->update($task, $request->except('users', 'q'));
        $task->users()->sync($request->users);
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Task $task
     * @return Response
     */
    public function destroy(Request $request)
    {
        $task = $this->task->find($request->id);
        $task->users()->detach();
        $task->delete();
        return "Done!";
    }
}
