<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Note;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Nop;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notes = Note::latest()
            ->where('excerpt', 'LIKE', "%$request->q%")
            ->get();
        return Inertia::render('Notes/Index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Notes/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'excerpt' => 'required|min:5',
            'content' => 'required|min:8'
        ]);
        /*$note = new Note([
            'excerpt' => $request->input('excerpt'),
            'content' => $request->input('content')
        ]); 
        $note->save();*/

        Note::create($request->all());
        return redirect()->route('notes.index')->with('status', 'Nota creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {        
        return Inertia::render('Notes/Show', ['note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return Inertia::render('Notes/Edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $this->validate($request,[
            'excerpt' => 'required|min:5',
            'content' => 'required|min:8'
        ]);        
        $note->update($request->all());
        return redirect()->route('notes.index')->with('status', 'Nota actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {        
        $note->delete();        
        return redirect()->route('notes.index')->with('status', 'Nota eliminada');
    }
}
