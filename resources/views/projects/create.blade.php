@extends('layouts.app')

@section('content')

    <div class="container">

    <h3>Create Project Idea</h3>


    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
           {!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            
            <label>Title</label>
            <input type="text" name="title" class="search_iput" style="display: block;width: 100%" required maxlength="191">
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
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
       
            <button type="submit" class="btn btn-default" style="float:right;width: 30%;"> Save</button>
            {!! Form::close() !!}

</div>
    
   </div>


@endsection