@extends('layouts.todo')

@section('title','Index')

@section('content')
<div class="container" style="padding-top: 10px">
    <h1 class="text-center" style="padding-bottom: 20px">ToDo List</h1>
    <a href="/todoapp/create" class="btn btn-info btn-sm" style="margin-bottom: 10px">Create</a>
    <a href="/restore" class="btn btn-primary btn-sm" style="margin-bottom: 10px">Restore</a>
    @if(session()->has('message'))
    <div class="alert alert-success" role="alert">{{session()->get('message')}}</div>
    @endif
    @if(session()->has('restoreMessage'))
    <div class="alert alert-info" role="alert">{{session()->get('restoreMessage')}}</div>
    @endif
    @if(session()->has('updateMessage'))
    <div class="alert alert-warning" role="alert">{{session()->get('updateMessage')}}</div>
    @endif
    @if(session()->has('deleteMessage'))
    <div class="alert alert-danger" role="alert">{{session()->get('deleteMessage')}}</div>
    @endif
    <table class="table table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Current Status</th>
                <th>Change Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        @foreach($todos as $todo)
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
                @if(!($todo->status))
                <abbr title="Mark as Completed"><a href="/markcomplete/{{$todo->id}}" style="color: rgb(23, 173, 23)" class="statusIcon"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></abbr>
               @else
               <abbr title="Mark as Inompleted"><a href="/markincomplete/{{$todo->id}}" style="color: rgb(177, 52, 30)" class="statusIcon"><i class="fa fa-times-circle" aria-hidden="true"></i></a></abbr>
               @endif
            </td>
            <td>
                <a href="/todoapp/update/{{$todo->id}}" class="btn btn-warning btn-sm">Update</a>
                <a href="/deleteTodo/{{$todo->id}}" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection