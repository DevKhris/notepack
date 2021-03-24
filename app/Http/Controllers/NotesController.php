<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();
        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $note = new Note;
        return view('notes.create', compact('note'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\NoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {

        if (auth()->user()->notes()->save(
            new Note([
                'title' => $request->title,
                'user_id' => auth()->user()->id,
                'content' => $request->content
            ])
        )) {
            return redirect()->route('notes.index')->with('status', 'Note Created succesfully');
        }
        return redirect()->route('notes.index')->with('status', 'Can\'t create the note');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = Note::find($id)->first();
        $author = $note->user()->first();
        return view('notes.show', compact(['note', 'author']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = Note::find($id)->first();
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\NoteRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NoteRequest $request, $id)
    {
        $note = Note::find($id)->first();
        $note->fill($request->only(['title', 'content']));
        if ($note->save()) {
            return redirect()->route('notes.index')->with('status', 'Note updated succesfully');
        }
        return redirect()->route('notes.index')->with('status', 'Can\'t update note');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = Note::find($id)->first();
        if ($note->destroy($id)) {
            return redirect()->route('notes.index')->with('status', 'Note deleted succesfully');
        }
        return redirect()->route('notes.index')->with('status', 'Can\'t delete note');
    }
}