<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        // RECUPERO I DATI DELLA RICHIESTA
        $form_data = $request->all();

        // CREO UNA NUOVA ISTANZA DI PROJECT
        $project = new Project;

        // DEFINISCO LO SLUG
        $slug = Str::slug($form_data['name'], '-');

        // DO IL VALORE DELLO SLUG DEFINITO ALLA RICHIESTA
        $form_data['slug'] = $slug;

        // USO IL FILL PER RIEMPIRE I CAMPI
        $project->fill($form_data);

        // SALVO LA NUOVA ISTANZA
        $project->save();

        // FACCIO UN REDIRECT ALLA PAGINA PRINCIPALE DI PROJECTS
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        // RECUPERO I DATI DELLA RICHIESTA
        $form_data = $request->all();

        // DEFINISCO LO SLUG
        $slug = Str::slug($form_data['name'], '-');

        // DO IL VALORE DELLO SLUG DEFINITO ALLA RICHIESTA
        $form_data['slug'] = $slug;

        // USO IL FILL PER RIEMPIRE I CAMPI
        $project->update($form_data);

        // FACCIO UN REDIRECT ALLA PAGINA PRINCIPALE DI PROJECTS
        return redirect()->route('admin.projects.show', ['project' =>  $project->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        $project->delete();
        return redirect()->route('admin.projects.index');
    }
}
