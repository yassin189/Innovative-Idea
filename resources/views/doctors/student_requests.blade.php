@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <div class="col-lg-6">
            @if (session()->has('success'))

                <div class="alert alert-success alert-dissmissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    {{session('success')}}
                </div>

            @endif

                @if($errors->all())
                    <div style="color: #a94442; background-color: #f2dede; border-color: #ebccd1;" class="alert ">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="text-center lead">Requests</div>
                @foreach($TeamRequestDoctor as $TeamRequestDocto)
                <div class="panel panel-default">

                        <div class="panel-body">
                            <form action="{{url('')}}/prof/student_requests" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <label>Project Title : </label>
                                    </div>
                                    <div class="col-lg-4">
                                        {{$TeamRequestDocto->project->title}}
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="{{url('')}}/projects/{{$TeamRequestDocto->project->id}}">Project Details</a>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <label>Team : </label>
                                    </div>
                                    <div class="col-lg-4">
                                        {{$TeamRequestDocto->team->leader->name}}
                                    </div>
                                    <div class="col-lg-2">
                                        <a href="{{url('')}}/team/{{$TeamRequestDocto->team_id}}">Team Details</a>
                                    </div>
                                </div>
                                <br><br><br>
                                <input type="hidden" name="team_id" value="{{$TeamRequestDocto->team_id}}" >
                                <div class="text-center">
                                    <button type="submit" name="accept" value="1" class="btn btn-primary">Accept</button>
                                    <button type="submit" name="accept" value="0" class="btn btn-primary">Refuse</button>
                                </div>
                            </form>
                        </div>

                </div>
                @endforeach
        </div>
        <div class="col-lg-6">
            <div class="text-center lead">Accepted Requests</div>
            @foreach($acceptedRequests as $acceptedRequest)
                <div class="panel panel-default">

                    <div class="panel-body">
                        <form action="{{url('')}}/prof/student_requests" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Project Title : </label>
                                </div>
                                <div class="col-lg-4">
                                    {{$acceptedRequest->project->title}}
                                </div>
                                <div class="col-lg-2">
                                    <a href="{{url('')}}/projects/{{$acceptedRequest->project->id}}">Project Details</a>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Team : </label>
                                </div>
                                <div class="col-lg-4">
                                    {{$acceptedRequest->team->leader->name}}
                                </div>
                                <div class="col-lg-2">
                                    <a href="{{url('')}}/team/{{$acceptedRequest->team_id}}">Team Details</a>
                                </div>
                            </div>
                            <br><br><br>
                            <input type="hidden" name="team_id" value="{{$acceptedRequest->team_id}}" >

                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</div>


@endsection