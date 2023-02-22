<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreRequest;
use App\Http\Requests\Project\UpdateRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ProjectResource::collection(
            Project::query()->latest()->paginate(10)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return ProjectResource
     */
    public function store(StoreRequest $request)
    {
        $request->validated();
        $project= Project::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'user_id' => Auth::id(),
        ]);
        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return ProjectResource
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return ProjectResource
     */
    public function update(StoreRequest $request, Project $project)
    {
        $request->validated();
        if ($request->user()->id !== $project->user_id) {
            return response()->json(['error' => 'You can only edit your own projects.'], 403);
        }

        $project->update($request->all());
        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->deleteOrFail();

        return response("Project removed successfully", 204);
    }
}
