@extends('layouts.app')

@section('content')
<?php
    $facs = \App\Faculty::get();
    $depts = \App\Departments::get();
 ?>
<div class="row  form-group">
    <div class="col-md-8 col-md-offset-2">

    <h1>Graduation Project</h1>
    <h5>Step 1: Team Leader</h5>

    </div>
  </div>

    {!! Form::open(['action' => 'StudentController@register_gp_SLeader_post', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="row form-group">
            <div class="form-group{{ $errors->has('student_id') ? ' has-error' : '' }}">
                 <div class="col-md-8 col-md-offset-2">
            {{Form::label('student_id', 'ID')}}
            {{Form::number('student_id', $studentL->student_id , ['class' => 'form-control', 'placeholder' => 'Your Faculty ID'])}}
                <div class="col-md-6">

                    @if ($errors->has('student_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('student_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        </div>


         <div class="row form-group">
                <div class="col-md-8 col-md-offset-2">
                    {{Form::label('faculty', 'Faculty')}}
                    <select class="search_iput" style="width:100%" name="faculty">

                        @foreach($facs as $fac)

                            @if($fac->id ==  $studentL->faculty_id)

                                <option selected value="{{$fac->id}}">
                                    {{$fac->little_name}}
                                </option>

                            @else
                            <option value="{{$dept->id}}">
                                    {{$dept->name}}
                                </option>
                                @endif

                        @endforeach

                    </select>

                </div>
            </div>


        <div class="row form-group">
                <div class="col-md-8 col-md-offset-2">
                    {{Form::label('dept', 'Department')}}
                    <select class="search_iput" style="width:100%" name="dept">

                        @foreach($depts as $dept)

                            @if($dept->id ==  $studentL->dept_id)

                                <option selected value="{{$dept->id}}">
                                    {{$dept->name}}
                                </option>

                            
                                @else
                            <option value="{{$dept->id}}">
                                    {{$dept->name}}
                                </option>
                                @endif
                        @endforeach

                    </select>

                </div>
            </div>

         <div class="row form-group">
               <div class="col-md-12 text-center">

        {{Form::submit('Next', ['class'=>'btn btn-primary'])}}
                </div>
</div>
    {!! Form::close() !!}
@endsection