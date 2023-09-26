<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Pekerja;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::select(
            'project.id',
            'project.name',
            'project.lokasi',
            'pekerja.name as pekerja_name',
            'role_pekerja.name as role_pekerja_name',
            'project.status',
            'project.foto'
        )
            ->leftJoin('pekerja', 'project.nama_mandor', 'pekerja.id')
            ->leftJoin('role_pekerja', 'pekerja.role_pekerja_id', 'role_pekerja.id')
            ->get();
        return view('home')->with([
            'project' => $project
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listPekerja = Pekerja::all();

        return view('project.create')->with([
            'listPekerja' => $listPekerja
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        // dd($request->all(), $request->file('foto'));

        $project = new Project();

        $project->name = $request->name;
        $project->lokasi = $request->lokasi;
        $project->waktu_mulai = $request->waktu_mulai;
        $project->waktu_selesai = $request->waktu_selesai;
        $project->total_pekerja = $request->total_pekerja;
        $project->nama_mandor = $request->nama_mandor;
        $project->nilai_project = $request->nilai_project;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('projects', 'public');
            $project->foto = $path;
        }

        $project->status = $request->status;

        $project->save();

        return redirect()->route('dashboard.index')->with('success', 'Project created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
