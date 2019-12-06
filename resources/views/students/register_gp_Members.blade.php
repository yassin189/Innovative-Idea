@extends('layouts.app')

@section('content')

<div class="row  form-group">
    <div class="col-md-8 col-md-offset-2">

    <h1>Graduation Project</h1>
    <h5>Step 2: Team Members</h5>

    </div>
  </div>

    {!! Form::open(['action' => 'StudentController@register_gp_Members_post', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}


            

            @for($i=0 ; $i < 4 ; $i++)

            <div class="row  form-group">
            <div class="col-md-8 col-md-offset-2">

                <h3>Member {{$i+1}}</h3>

            </div>
            </div>

            <div class="row form-group">
            <div class="form-group{{ $errors->has('name_'.$i) ? ' has-error' : '' }}">
            <div class="col-md-8 col-md-offset-2">

                    {{Form::label('name', 'Name')}}
                    {{Form::text('name_'.$i, '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
                
               <div class="col-md-6">

                    @if ($errors->has('name_'.$i))
                        <span class="help-block">
                            <strong>{{ $errors->first('name_'.$i) }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            </div>
        </div>

            <div class="row form-group">
            <div class="form-group{{ $errors->has('email_'.$i) ? ' has-error' : '' }}">
            <div class="col-md-8 col-md-offset-2">

                    {{Form::label('email', 'E-mail')}}
                    {{Form::email('email_'.$i, '', ['class' => 'form-control', 'placeholder' => 'E-mail'])}}
                
               <div class="col-md-6">

                    @if ($errors->has('email_'.$i))
                        <span class="help-block">
                            <strong>{{ $errors->first('email_'.$i) }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        </div>

        <div class="row form-group">
            <div class="form-group{{ $errors->has('student_id_'.$i) ? ' has-error' : '' }}">
            <div class="col-md-8 col-md-offset-2">

                    {{Form::label('student_id', 'ID')}}
                    {{Form::number('student_id_'.$i, '', ['class' => 'form-control', 'placeholder' => 'Faculty ID'])}}
                
               <div class="col-md-6">

                    @if ($errors->has('student_id_'.$i))
                        <span class="help-block">
                            <strong>{{ $errors->first('student_id_'.$i) }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        </div>


                <hr>

            @endfor
        
        
            <div class="row  form-group">
               <div class="col-md-12 text-center">
                    {{Form::submit('Next', ['class'=>'btn btn-primary'])}}
            </div>
            </div>


        {!! Form::close() !!}
@endsection