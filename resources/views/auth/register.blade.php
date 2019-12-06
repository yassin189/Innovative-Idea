@extends('layouts.app')

@section('content')

<?php
    $facs = \App\Faculty::get();
    $deps = \App\Departments::get();
 ?>
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fas fa-plus-square"></i> <b>REGISTER</b></div>
                <div class="panel-body">
                    <form class="form-horizontal"  role="form" method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                                <div class="panel-heading"><i class="fas fa-plus-square"></i> <b> As Faculty?</b>
                                 <small style="display: block;color: #e74c3c;">SWAP RIGHT TO GET PROFESSOR FORM</small></div>

                                

                                    <div class="form-group{{ $errors->has('name_fa') ? ' has-error' : '' }}">
                                        
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                            <input  type="text" style="width: 100%" class="search_iput" name="name_fa" value="{{ old('name_fa') }}"  autofocus>

                                            @if ($errors->has('name_fa'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name_fa') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email_fa') ? ' has-error' : '' }}">
                                        

                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <input  type="email" style="width: 100%" class="search_iput" name="email_fa" value="{{ old('email_fa') }}" >

                                            @if ($errors->has('email_fa'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email_fa') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_fa') ? ' has-error' : '' }}">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-key"></i>
                                            </div>
                                            <input  type="password" style="width: 100%" class="search_iput" name="password_fa" >

                                            @if ($errors->has('password_fa'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_fa') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-key"></i>
                                            </div>
                                            <input  placeholder=" Reapet Password" style="width:100%" type="password" class="search_iput" name="password_confirmation_fa" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-phone-square"></i>
                                            </div>
                                            <input  placeholder=" PHONE" type="text" style="width:100%" class="search_iput" name="phone_fa" >

                                            @if ($errors->has('phone_fa'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone_fa') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-compress-arrows-alt"></i>
                                            </div>
                                            <input id="l-name" placeholder=" SHORT NAME LIKE 'FCIH'" type="text" style="width:100%" maxlength="6" class="search_iput" name="l-name_fa" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-server"></i>
                                            </div>
                                            <input id="sub-domain" placeholder=" MAIL DOMAIN LIKE ' @fcih ' " type="text" style="width:100%" maxlength="6" class="search_iput" name="sub-domain_fa" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <button type="submit" name="submit" value='fac' class="btn btn-primary">
                                                Register
                                            </button>
                                            <a class="btn btn-link" href="{{ route('login') }}">
                                                <small><strong>ALEARDY HAVE ACCOUNT</strong></small>
                                            </a>
                                        </div>
                                    </div>
                               
                          </div>
                          <div class="swiper-slide">
                            <div class="panel-heading"><i class="fas fa-plus-square"></i> <b> As PROFESSOR?</b>
                             <small style="display: block;color: #e74c3c;">SWAP RIGHT TO GET STUDENT FORM OR LEFT TO GET FACULTY FORM</small></div>
                               
                                    <div class="form-group{{ $errors->has('name_prof') ? ' has-error' : '' }}">
                                        
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                            <input  type="text" style="width: 100%" class="search_iput" name="name_prof" value="{{ old('name_prof') }}"  autofocus>

                                            @if ($errors->has('name_prof'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name_prof') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email_prof') ? ' has-error' : '' }}">
                                        

                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <input  type="email" style="width: 100%" class="search_iput" name="email_prof" value="{{ old('email_prof') }}" >

                                            @if ($errors->has('email_prof'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email_prof') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_prof') ? ' has-error' : '' }}">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-key"></i>
                                            </div>
                                            <input  type="password" style="width: 100%" class="search_iput" name="password_prof" >

                                            @if ($errors->has('password_prof'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_prof') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-key"></i>
                                            </div>
                                            <input  placeholder=" Reapet Password" style="width:100%" type="password" class="search_iput" name="password_confirmation_prof" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-phone-square"></i>
                                            </div>
                                            <input  placeholder=" PHONE" type="text" style="width:100%" class="search_iput" name="phone_prof" >

                                            @if ($errors->has('phone_prof'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone_prof') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <select class="search_iput" style="width:100%" name="fac_name_prof" id="fac_prof">
                                                <option selected disabled> SELECET YOUR FACULTY.</option>
                                                @foreach($facs as $fac)
                                                    <option value="{{$fac->id}}">
                                                        {{$fac->little_name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <select class="search_iput" style="width:100%" name="dept_prof" id="prof_dept">
                                                <option selected disabled> SELECET YOUR DEPARTMENT.</option>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <button type="submit"  name="submit" value='prof' class="btn btn-primary">
                                                Register
                                            </button>
                                            <a class="btn btn-link" href="{{ route('login') }}">
                                                <small><strong>ALEARDY HAVE ACCOUNT</strong></small>
                                            </a>
                                        </div>
                                    </div>
                               


                          </div>
                          <div class="swiper-slide">
                            <div class="panel-heading"><i class="fas fa-plus-square"></i> <b> As STUDENT?</b>
                             <small style="display: block;color: #e74c3c;">SWAP RIGHT TO GET COMPANY FORM OR LEFT TO GET PROFESSORS FORM</small></div>
                                    

                                    <div class="form-group{{ $errors->has('student_id_stu') ? ' has-error' : '' }}">
                                        
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                            <input  type="number" style="width: 100%" class="search_iput" name="student_id_stu" placeholder=" ID" value="{{ old('student_id') }}"  autofocus>

                                            @if ($errors->has('student_id_stu'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('student_id_stu') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group{{ $errors->has('name_stu') ? ' has-error' : '' }}">
                                        
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                            <input  type="text" style="width: 100%" class="search_iput" name="name_stu" value="{{ old('name_stu') }}"  autofocus>

                                            @if ($errors->has('name_stu'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name_stu') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email_stu') ? ' has-error' : '' }}">
                                        

                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <input  type="email" style="width: 100%" class="search_iput" name="email_stu" value="{{ old('email_stu') }}" >

                                            @if ($errors->has('email_stu'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email_stu') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_stu') ? ' has-error' : '' }}">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-key"></i>
                                            </div>
                                            <input  type="password" style="width: 100%" class="search_iput" name="password_stu" >

                                            @if ($errors->has('password_stu'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_stu') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-key"></i>
                                            </div>
                                            <input  placeholder=" Reapet Password" style="width:100%" type="password" class="search_iput" name="password_confirmation_stu" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-phone-square"></i>
                                            </div>
                                            <input  placeholder=" PHONE" type="text" style="width:100%" class="search_iput" name="phone_stu" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <select class="search_iput" style="width:100%" name="st_fac_name_stu" id="std_fac">
                                                <option selected disabled> SELECT YOUR FACULTY.</option>
                                                @foreach($facs as $fac)
                                                    <option value="{{$fac->id}}">
                                                        {{$fac->little_name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <select class="search_iput" style="width:100%" name="st_fac_dept_stu" id="std_fac_dept">
                                                <option selected disabled> SELECT YOUR DEPARTMENT.</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <button type="submit"  name="submit" value='stu' class="btn btn-primary">
                                                Register
                                            </button>
                                            <a class="btn btn-link" href="{{ route('login') }}">
                                                <small><strong>ALEARDY HAVE ACCOUNT</strong></small>
                                            </a>
                                        </div>
                                    </div>
                               
                          </div>
                           <div class="swiper-slide">
                            <div class="panel-heading"><i class="fas fa-plus-square"></i> <b> As COMPANY?</b>
                             <small style="display: block;color: #e74c3c;">SWAP LEFT TO GET STUDENTS FORM</small></div>
                                
                                    

                                    <div class="form-group{{ $errors->has('name_com') ? ' has-error' : '' }}">
                                        
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-user-tie"></i>
                                            </div>
                                            <input  type="text" style="width: 100%" class="search_iput" name="name_com" value="{{ old('name_com') }}"  autofocus>

                                            @if ($errors->has('name_com'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name_com') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('email_com') ? ' has-error' : '' }}">
                                        

                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                            <input  type="email" style="width: 100%" class="search_iput" name="email_com" value="{{ old('email_com') }}" >

                                            @if ($errors->has('email_com'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email_com') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_com') ? ' has-error' : '' }}">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-key"></i>
                                            </div>
                                            <input  type="password" style="width: 100%" class="search_iput" name="password_com" >

                                            @if ($errors->has('password_com'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_com') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-key"></i>
                                            </div>
                                            <input  placeholder=" Reapet Password" style="width:100%" type="password" class="search_iput" name="password_confirmation_com" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="absoluteRightTop text-right">
                                                <i class="fas fa-phone-square"></i>
                                            </div>
                                            <input  placeholder=" PHONE" type="text" style="width:100%" class="search_iput" name="phone_com" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <textarea  placeholder=" Description" type="text" style="width:100%" class="search_iput" name="desc_com" ></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <input  placeholder=" Address" type="text" style="width:100%" class="search_iput" name="Address_com" >
                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-2">
                                            <button type="submit"  name="submit" value='comp' class="btn btn-primary">
                                                Register
                                            </button>
                                            <a class="btn btn-link" href="{{ route('login') }}">
                                                <small><strong>ALEARDY HAVE ACCOUNT</strong></small>
                                            </a>
                                        </div>
                                    </div>
                                
                          </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
          $("#fac_prof").change(function(){
             var selector = document.getElementById('fac_prof');
                var value = selector[selector.selectedIndex].value;
            $.ajax({
                 url: "{{url('/')}}/get/deprt/"+value,
                 beforeSend: function( xhr ) {
                 xhr.overrideMimeType( "application/json; charset=utf-8" );
                          }
                        }).done(function( data ) {
                 $.each(data, function(i, item) {
                    $("#prof_dept").append(new Option(item.short_name, item.id));
                     });
                });
         });

          $("#std_fac").change(function(){
             var selector = document.getElementById('std_fac');
                var value = selector[selector.selectedIndex].value;
            $.ajax({
                 url: "{{url('/')}}/get/deprt/"+value,
                 beforeSend: function( xhr ) {
                 xhr.overrideMimeType( "application/json; charset=utf-8" );
                          }
                        }).done(function( data ) {
                 $.each(data, function(i, item) {
                    $("#std_fac_dept").append(new Option(item.short_name, item.id));
                     });
                });
         });
    });
   
     
</script>
@endsection
