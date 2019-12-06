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

            <form action="{{url('')}}/prof/open_registraion_date" method="post">
                @csrf
                <div class="form-group">
                    <label>Start Date</label>
                    <input name="start_date" type="date" class="form-control">
                </div>
                <div class="form-group">
                    <label>End Date</label>
                    <input name="end_date" type="date" class="form-control">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">

                        <div class="text-center lead">
                            Your Open Rejestraion Dates
                        </div>


                    @foreach($DoctorRegistration as $DoctorRegistratio)
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Start Date</label>
                                    {{$DoctorRegistratio->start_date}}
                                </div>
                                <div class="form-group">
                                    <label>End Date</label>
                                    {{$DoctorRegistratio->end_date}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection