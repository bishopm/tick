<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use App\Repositories\TasksRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * @var TaskRepository
     */
    private $task;

    public function __construct(TasksRepository $task)
    {
        $this->task = $task;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store($project, CreateTaskRequest $request)
    {
        return $this->task->create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Task $task
     * @param  Request $request
     * @return Response
     */
    public function update(Task $task, UpdateTaskRequest $request)
    {
        return $this->task->update($task, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Task $task
     * @return Response
     */
    public function destroy(Task $task)
    {
        $this->task->destroy($task);
        return "Done!";
    }
}
