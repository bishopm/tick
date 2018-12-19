<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Repositories\ProjectsRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UsersRepository;

class ProjectsController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $project;
    private $user;

    public function __construct(ProjectsRepository $project, UsersRepository $user)
    {
        $this->project = $project;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index($id)
    {
        return $this->user->myactiveprojects($id);
    }

    public function someday($id)
    {
        return $this->user->myinactiveprojects($id);
    }

    public function show($id)
    {
        return Project::with('tasks', 'users')->find($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $project = $this->project->create($request->except('users'));
        $project->users()->sync($request->users);
        return $project;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Project $project
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $project = $this->project->find($id);
        $this->project->update($project, $request->except('users', 'q'));
        $project->users()->sync($request->users);
        return $project;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project $project
     * @return Response
     */
    public function destroy(Project $project)
    {
        $this->project->destroy($project);
        return "Done!";
    }
}
