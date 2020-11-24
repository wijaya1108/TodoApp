@extends('layouts.todo')

@section('title','Update Todo')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h1>Update Todo</h1>
        </div>
        <div class="col-md-4"></div>
        <div class="col-12">
            <form method="post" action="/todoapp/updates">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control" value="{{$todo->title}}">
                    <small class="errorMsg">@error('title'){{$message}}@enderror</small>
                </div>
                <input type="hidden" name="id" value="{{$todo->id}}">
                <button type="submit" class="btn btn-info btn-sm">Update</button>
                <button type="reset" class="btn btn-danger btn-sm">Clear</button>
            </form>
        </div>
    </div>
</div>
@endsection