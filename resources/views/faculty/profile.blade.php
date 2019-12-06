@extends('layouts.app')

@section('content')
<div style="padding-left:15px;padding-right: 15px">
	<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
		<div class="_con_card" style="height: 250px;">
		
    				<h1 class="h1_optimzed"> <i class="fas fa-bell"></i> <b>Personal Data</b>
    					<a href="#" style="color:#3498db;float:right;padding-right:15px;cursor:pointer" data-toggle="tooltip" data-placement="right" title="Edit Personal Data !"><i class="fas fa-edit" ></i></a>
    				</h1>
    				<hr>
    				<div class="Content-Li">
    					<p><b><i class="fas fa-signature" style="font-size: 12px;margin-left:5px;"></i> Name</b> : {{substr(auth()->user()->name,0,25)}}@if(strlen(auth()->user()->name) > 25) .. @endif</p>
    					<p><b><i class="fas fa-envelope" style="font-size: 12px;margin-left:5px;"></i> Email</b> : {{substr(auth()->user()->email,0,25)}}@if(strlen(auth()->user()->email) > 25) .. @endif</p>
    					<p> <b><i class="fas fa-phone" style="font-size: 12px;margin-left:5px;"></i> Phone </b>: {{substr(auth()->user()->phone,0,25)}}@if(strlen(auth()->user()->phone) > 25) .. @endif</p>
    				</div>
    				<div style="text-align: center;margin-top:52px;">
    					<i class="fas fa-angle-double-down" id="scroller"></i>
    				</div>
    				<div class="PersonalDataForm" id="PersonalForm" style="width: 95%;">
    					<form action="{{url('/')}}/upload/profile" method="post">
    						@csrf
    						<div class="form-group">
    							<label>
    								Name
    							</label>
    							<input type="text" name="name" class="search_iput" style="display: block;width: 100%" maxlength="191" placeholder="John Doe" value="{{auth()->user()->name}}">
    						</div>
    						<div class="form-group">
    							<label>
    								Email
    							</label>
    							<input type="email" name="email" class="search_iput" style="display: block;width: 100%" maxlength="191" placeholder="John.Doe@example.dot" value="{{auth()->user()->email}}">
    						</div>
    						<div class="form-group">
    							<label>
    								Phone
    							</label>
    							<input type="text" name="phone" class="search_iput" style="display: block;width: 100%" maxlength="191" placeholder="123456789" value="{{auth()->user()->phone}}">
    						</div>
    						<div class="form-group">
    							<label>
    								New Password
    							</label>
    							<input type="password" name="new_password" class="search_iput" maxlength="191" style="display: block;width: 100%" >

    						</div>
    						<div class="form-group">
    							<label>
    								Old Password <span style="color:red;">*</span> 
    							</label>
    							<input type="password" name="old_password" class="search_iput" style="display: block;width: 100%" required>

    						</div>
    						<button type="submit" name="submit" class="btn btn-default" style="float:right">
    							<i class="fas fa-pen-nib">
    								
    							</i>
    							Edit
    						</button>
    					</form>
    				</div>
    	</div>
    			<br>
    	<div class="_con_card" style="height: 250px;">
    				<h1 class="h1_optimzed"> <i class="fas fa-bell"></i> <b>Faculty Data</b>
    					<a href="#" style="color:#3498db;float:right;padding-right:15px;cursor:pointer" data-toggle="tooltip" data-placement="right" title="Edit Personal Data !"><i class="fas fa-edit" ></i></a>
    				</h1>
    				<hr>
    				<div class="Content-Li">
    					<p><b><i class="fas fa-copyright" style="font-size: 12px;margin-left:5px;"></i> Little Name</b> : {{$faculty->little_name}}</p>
    					<p><b><i class="fas fa-layer-group" style="font-size: 12px;margin-left:5px;"></i> Sub Domain</b> : {{$faculty->sub_domain}}</p>
    					<p> <b><i class="fas fa-copy" style="font-size: 12px;margin-left:5px;"></i> Summary </b>: {{$faculty->summary}}</p>
    				</div>
    				<div style="text-align: center;margin-top:52px;">
    					<i class="fas fa-angle-double-down" id="scroller"></i>
    				</div>
    				<div class="PersonalDataForm" id="PersonalForm" style="width: 95%;">
    					<form action="{{url('/')}}/upload/faculty-data" method="post">
    						@csrf
    						<div class="form-group">
    							<label>
    								little Name
    							</label>
    							<input type="text" name="little_name" class="search_iput" style="display: block;width: 100%" maxlength="191" placeholder="FCIH" value="{{$faculty->little_name}}">
    						</div>
    						<div class="form-group">
    							<label>
    								Sub Domain
    							</label>
    							<input type="text" name="sub_domain" class="search_iput" style="display: block;width: 100%" maxlength="191" placeholder="@fcih" value="{{$faculty->sub_domain}}">
    						</div>
    						<div class="form-group">
    							<label>
    								Summary
    							</label>
    							<textarea class="search_iput" style="display: block;width: 100%;height: 88px;" name="summary" placeholder="This is small summary about our faculty">
    								{{$faculty->summary}}
    							</textarea>
    						</div>
    						<div class="form-group">
    							<label>
    								Old Password <span style="color:red;">*</span> 
    							</label>
    							<input type="password" name="old_password" class="search_iput" style="display: block;width: 100%" required>

    						</div>
    						<button type="submit" name="submit" class="btn btn-default" style="float:right">
    							<i class="fas fa-pen-nib">
    								
    							</i>
    							Edit
    						</button>
    					</form>
    				</div>
    			</div>
    				<br>
    		<div class="_con_card" style="height: 250px;">
    				<h1 class="h1_optimzed"> <i class="fas fa-bell"></i> <b>Faculty Departments</b>
    					<a href="{{url('/')}}/departments" style="color:#3498db;float:right;padding-right:15px;cursor:pointer" data-toggle="tooltip" data-placement="right" title="Edit Personal Data !"><i class="fas fa-edit" ></i></a>
    					<a href="{{url('/')}}/departments" style="color:#3498db;float:right;padding-right:15px;cursor:pointer" data-toggle="tooltip" data-placement="top" title="Add New Departments !"><i class="fas fa-plus" ></i></a>
    				</h1>
    				<hr>

    				<div class="Content-Li">
    					@foreach($departments as $key=>$department)
    					<p>
    						<b>
    							<i class="fas fa-arrow" style="font-size: 12px;margin-left:5px;"></i>
    						Deparment No.{{$key+1}}</b> : {{$department->name}} 
    					<small style="display: block; margin-left: 125px;">
    						<strong> Student Numbers 
    							<span style="font-size:15px;color:green">{{$department->number_of_students}}</span>
    						</strong>
    						</small>
    						<small style="display: block; margin-left: 125px;">
    							<strong> Doctors Numbers <span style="font-size:15px;color:green">{{$department->number_of_doctors}}</span>
    							</strong>
    						</small>
    					</p>
    					@endforeach
    				
    				</div>
    			</div>
    			
			</div>
	<div class="col-lg-6"></div>		
	<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
		<div class="_con_card" style="height: 250px;">
			<h1 class="h1_optimzed"> <i class="fas fa-bell"></i> <b>Students In Faculty</b>
    			
    		</h1>
    		<hr>
    		<div class="Content-Li">
    			@if(count($students) >= 1)
    				@foreach($students as $student)
    				<p><b style="display: block">{{$student->user->name}}</b><small>{{$student->student_id}}</small></p>
    			@endforeach
    			@else
    				<div style="text-align: center;color:red"><b>No Professors</b></div>
    			@endif
    		</div>	
		</div>
		<br>
		<div class="_con_card" style="height: 250px;">
			<h1 class="h1_optimzed"> <i class="fas fa-bell"></i> <b>Professors In Faculty</b>
    			
    		</h1>
    		<hr>
    		<div class="Content-Li">
    			@if(count($professors)>=1)
    				@foreach($professors as $professor)
    				<p><b style="display: block">{{$professor->user->name}}</b><small></small></p>
    				@endforeach
    			@else
    				<div style="text-align: center;color:red"><b>No Professors</b></div>
    			@endif
    		</div>	
		</div>
	</div>
</div>
@endsection