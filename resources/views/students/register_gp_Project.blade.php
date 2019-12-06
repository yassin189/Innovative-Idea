@extends('layouts.app')


<?php
//    $user_profs = \App\User::get();
//    $prof = new \App\Professor;
    $studL = \App\Student::get()->where('user_id',auth()->user()->id)->first();
 ?>
@section('content')

  <div class="form-group">
    <div class="col-md-8 col-md-offset-2">

    <h1>Graduation Project</h1>
    <h5>Step 3: Project Details</h5>

    </div>
  </div>
  @if($errors->all())
      <div style="color: #a94442; background-color: #f2dede; border-color: #ebccd1;" class="alert ">
          <ul>
              @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
              @endforeach
          </ul>
      </div>
  @endif



  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
      {!! Form::open(['action' => 'StudentController@register_gp_Project_post', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class="form-group">

          <label>Title</label>
          <input type="text" name="title" class="search_iput" style="display: block;width: 100%" required maxlength="191">
      </div>
      <div class="form-group">
          {{Form::label('body', 'Body')}}

          <textarea onkeyup="loadMySubCategory(event ,'my-projects')" name="body"  class="form-control"></textarea>
      </div>

  <div id="my-projects">

  </div>




  </div>
  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
      <div class="form-group">

          <label>Tools "Multiple Choose"</label>
          <select class="search_iput" name="tools[]" multiple style="width:100%;display: block ">
              @foreach($tools as $tool)
                  <option value="{{$tool->name}}">{{$tool->name}}</option>
              @endforeach
          </select>
      </div>
      <br>
      <div class="form-group">
          <small style="display: block;color:#e74c3c;"><b>If your tools not found mention new tools here seprated by comma "," And No Spaces</b></small>
          <label>New Tools</label>

          <input type="text" name="new_tools" class="search_iput" style="display: block; width: 100%" placeholder="HTML,CSS,JAVASCRIPT">

      </div>
      <br>
      <div class="form-group">
          <small style="display: block;color:#e74c3c;"><b>If this old or you made a documentaion please save it as PDF and upload it</b></small>

          <label>Documentaion</label>

          <input type="file" name="documentaion" class="search_iput" style="display: block; width: 100%">

      </div>
      <br>

      <div class="form-group">
          <small style="display: block;color:#e74c3c;"><b>If this old or you made a Code  please save it as ZIP and upload it</b></small>


          <label>Code ZIP Document</label>
          <input type="file" name="Code" class="search_iput" style="display: block; width: 100%">

      </div>



  </div>
        

                            <div class="row form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <select required class="search_iput" style="width:100%" name="prof">
                                        <option selected disabled>Select your Professor Supervisor 1.</option>
                                        @foreach($doctors as $doctor)
                                            @if($doctor->dept_id == $studL->dept_id)
                                                <option value="{{$doctor->id}}">
                                                    {{$doctor->user->name}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
  <div class="row form-group">
      <div class="col-md-8 col-md-offset-2">
          <select required class="search_iput" style="width:100%" name="prof2">
              <option selected disabled>Select your Professor Supervisor 2.</option>
              @foreach($doctors as $doctor)
                  @if($doctor->dept_id == $studL->dept_id)
                      <option value="{{$doctor->id}}">
                          {{$doctor->user->name}}
                      </option>
                  @endif
              @endforeach
          </select>
      </div>
  </div>
  <div class="row form-group">
      <div class="col-md-8 col-md-offset-2">
          <select required class="search_iput" style="width:100%" name="prof3">
              <option selected disabled>Select your Professor Supervisor 3.</option>
              @foreach($doctors as $doctor)
                  @if($doctor->dept_id == $studL->dept_id)
                      <option value="{{$doctor->id}}">
                          {{$doctor->user->name}}
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