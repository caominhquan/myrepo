<?php

namespace App\Http\Controllers;
use App\Note;
use Illuminate\Http\Request;

class NotesAPIController extends Controller
{
     public function index()
    {
        return Note::get();
    }

    public function store(Request $request) {
        $post = new Note();
        $post->title = $request->title;
        $post->description = $request->input('description');
        $post->save();
    }

    public function show($id) {
        return Note::findOrFail($id);
    }

    public function update(Request $request, $id) {
        $post = Note::findOrFail($id);
        $post->update($request->all());
        return $post;
    }
    
    public function destroy($id) {
        if($id != null) {
            $post = Note::findOrFail($id);
            $post->delete();
        }
    }
}
