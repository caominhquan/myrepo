<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;
use Auth;
use Image;

class NotesController extends Controller
{
    public function index()
    {
   		$data['notes'] = Note::paginate(10);  
        return view('notes.list',$data);
    }

    public function create()
    {
        return view('notes.create');
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'grade' => 'required',
        ]); 
        Note::create($request->all());
        return Redirect::to('notes')->with('success','Great! Note created successfully.');
    }  
   
    public function show($id)
    {
    }  
    
    public function edit($id)
    {   
        $notes = Note::find($id);
        return view('notes.edit')->with('notes', $notes);
    } 
    
    public function update(Request $request, $id)
    {

       
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'grade' => 'required',
        // ]);
        // $update = ['title' => $request->title, 'description' => $request->description, 'image' => $request->image, 'grade' => $request->grade];
        // Note::where('id',$id)->update($update);
        // return Redirect::to('notes')->with('success','Great! Notes updated successfully');

        $notes = Note::find($id);

        $notes->name = $request->input('name');
        $notes->description = $request->input('description');
        $notes->grade = $request->input('grade');

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/images/', $filename);
            $notes->image = $filename;
        }
        $notes->save();
        return redirect('/notes')->with('notes', $notes);
    }
   
    public function destroy($id)
    {
        Note::where('id',$id)->delete(); 
        return Redirect::to('notes')->with('success','Note deleted successfully');
    }

    public function search(Request $request)
    {
    	$search = $request->get('search');
    	$notes = DB::table('notes')->where('title','like', '%'.$search.'%')->paginate(10);
    	return view('notes.list',['notes' => $notes]);
    }

    

    
}
