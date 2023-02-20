<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    protected $rules = [
        'name' => 'required|min:3|max:100|string|unique:projects',
        'publication_date' => 'required',
        'preview' => 'required|url|min:10',
        'complexity' => 'required|min:1|max:5',
        'language_used' => 'required|min:3|max:100|string',
        'github_url' => 'required|url|min:10',
    ];

    protected $messages = [
        'name.required' => 'Inserisci il nome del progetto.',
        'name.min' => 'Il nome è troppo corto.',
        'name.max' => 'Il nome è troppo lungo.',
        'name.unique' => 'Il nome del progetto deve essere UNICO',
        'publication_date.required' => 'Inserisci la data di pubblicazione del progetto.',
        'preview.required' => 'Inserisci l\'url della copertina.',
        'preview.url' => 'Url troppo corto o non valido.',
        'preview.min' => 'Url troppo corto o non valido.',
        'complexity.required' => 'Inserisci il livello di complessità.',
        'complexity.min' => 'Il numero deve essere compreso tra 1 e 5',
        'complexity.max' => 'Il numero deve essere compreso tra 1 e 5',
        'language_used.required' => 'Inserisci il linguaggio di programmazione usato.',     
        'language_used.min' => 'Il linguaggio è troppo corto.',
        'language_used.max' => 'Il linguaggio è troppo lungo.',
        'github_url.require' => 'Inserisci l\'url della repository GitHub.',
        'github_url.url' => 'Url non valido.',
    ];
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate(
        $this->rules, $this->messages
        );
        $data['slug'] = Str::slug($data['name']);
        $newProject = new Project();
        $newProject->fill($data);
        $newProject->save();

        return redirect()->route('admin.projects.show', $newProject->id );
    }

    /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
