<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Repositories\ProjectsRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $project;

    public function __construct(ProjectsRepository $project)
    {
        $this->project = $project;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        return $this->project->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(CreateProjectRequest $request)
    {
        return $this->project->create($request->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Project $project
     * @param  Request $request
     * @return Response
     */
    public function update(Project $project, UpdateProjectRequest $request)
    {
        return $this->project->update($project, $request->all());
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
