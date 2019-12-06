@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
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
                @foreach($team->students as $student)
                <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    Student Name:
                                </div>
                                <div class="col-lg-6">
                                {{$student->user->name}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    Student ID:
                                </div>
                                <div class="col-lg-6">
                                    {{$student->student_id}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    Student Email:
                                </div>
                                <div class="col-lg-6">
                                    {{$student->user->email}}
                                </div>
                            </div>
                        </div>

                </div>
                @endforeach
        </div>
        <div class="col-lg-3"></div>

    </div>
</div>


@endsection