@extends('layouts.todo')

@section('title','Create ToDo')

@section('content')
<div class="container" style="padding-top: 20px">
    <div class="row" style="padding-bottom:20px">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="border: 2px solid rgb(138, 167, 147)">
            <h1 class="text-center">Insert a ToDo</h1>
        </div>
        <div class="col-md-4"></div>
    </div>
    <div class="col-12">
    <form method="post" action="/todoapp/store">
        @csrf
        <div class="form-group">
            <input type="text" name="title" class="form-control" placeholder="Enter a Todo Here">
            <small class="errorMsg">@error('title'){{$message}}@enderror</small>
        </div>
        <button type="submit" class="btn btn-success btn-sm">Submit</button>
        <button type="reset" class="btn btn-danger btn-sm">Clear</button>
    </form>
    </div>
</div>
@endsection