@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">

    <h1>Projects Ideas</h1>
    <a href="/projects/create" class="btn btn-primary">Create Project Idea</a>



<br/><br/>



    @if(count($projects) > 0)
        @foreach($projects as $project)
            <div class="well">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/projects/{{$project->id}}">{{$project->title}}</a></h3>
                        <small>Written on {{$project->created_at}} by {{$project->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$projects->links()}}
    @else
        <p>No projects found</p>
    @endif

    </div>
</div>
@endsection