@extends('layouts.todo')

@section('title','Restore Todos')

@section('content')
<div class="container">
    <h1 class="text-center" style="margin-bottom:20px">Restore Todo</h1>
    <table class="table table-striped text-center">
       <thead class="thead-dark">
           <tr>
               <th>ID</th>
               <th>Title</th>
               <th>Current Status</th>
               <th>Actions</th>
           </tr>
       </thead>
       @foreach($deletedTodos as $todo)
       <tr>
           <td>{{$todo->id}}</td>
           <td>{{$todo->title}}</td>
           <td>
               @if($todo->status)
               <span class="badge badge-success">Completed</span>
               @else 
               <span class="badge badge-danger">Incompleted</span>
               @endif
           </td>
           <td>
               <a href="/restoreTodo/{{$todo->id}}" class="btn btn-info btn-sm">Restore</a>
               <a href="/delTodo/{{$todo->id}}" class="btn btn-danger btn-sm">Delete</a>
           </td>
       </tr>
       @endforeach
    </table> 
</div>
@endsection