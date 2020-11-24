<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(){

        $data = Todo::all();
        return view('todoapp.index')->with('todos',$data);
    }

    public function create(){

        return view('todoapp.create');
    }

    public function store(Request $request){
        
        //validate them
        $this->validate($request,[
            'title'=>'required|max:60'
        ],
        [
            'title.required'=>'Title is required!'
        ]);

        $todo = new Todo;
        $todo->title = $request->title;
        $todo->save();
        return redirect()->route('index')->with('message','Record Added Successfully!');
    }

    public function showUpdate($id){

        $todo = Todo::find($id);
        return view('todoapp.update')->with('todo',$todo);
    }

    public function update(Request $request){

        $this->validate($request,[
            'title'=>'required|max:60'
        ],
        [
            'title.required'=>'Title is required!'
        ]);

        $id = $request->id;
        $record = Todo::find($id);
        $record->title = $request->title;
        $record->save();
        return redirect()->route('index')->with('updateMessage','Record Updated Successfully!');
    }

    public function markComplete($id){

        $record = Todo::find($id);
        $record->status = 1;
        $record->save();
        return redirect()->route('index');
    }

    public function markIncomplete($id){

        $record = Todo::find($id);
        $record->status = 0;
        $record->save();
        return redirect()->route('index');
    }

    public function delete($id){

        $record = Todo::find($id);
        $record->delete();
        return redirect()->route('index')->with('deleteMessage','Record Deleted Successfully!');
    }

    public function restore(){

        $data = Todo::onlyTrashed()->get();
        return view('todoapp.restore')->with('deletedTodos',$data);
    }

    public function restoreTodo($id){

        Todo::withTrashed()->where('id',$id)->restore();
        return redirect()->route('index')->with('restoreMessage','Record Restored Successfully!');
    }

    public function deletePermanently($id){

        Todo::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->route('index')->with('deleteMessage','Record Deleted Permanently!');
    }

}
