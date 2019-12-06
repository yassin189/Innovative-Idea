@extends('layouts.app')
@section('content')
<div style="padding-left:15px;padding-right: 15px">
	<div class="content" style="background-color: white">
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
    							<input type="text" name="phone" class="search_iput" style="display: block;width: 100%" maxlength="191" 
    							placeholder="123456789" value="{{auth()->user()->phone}}">
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
		
    				<h1 class="h1_optimzed"> <i class="fas fa-bell"></i> <b>Your Open Rejestraion Dates</b>
    					<a href="#" style="color:#3498db;float:right;padding-right:15px;cursor:pointer" data-toggle="tooltip" data-placement="right" title="Edit Rejestraion Dates!"><i class="fas fa-edit" ></i></a>
    				</h1>
    				<hr>
    				<div class="Content-Li">

    					@if($registerationTime != null)
                        <p><b><i class="fas fa-signature" style="font-size: 12px;margin-left:5px;"></i> Start Date</b> : {{$registerationTime->start_date}} </p>

                        <p><b><i class="fas fa-signature" style="font-size: 12px;margin-left:5px;"></i> Start Date</b> : {{$registerationTime->end_date}} </p>
                        @endif


    				</div>
    				<div style="text-align: center;margin-top:85px;">
    					<i class="fas fa-angle-double-down" id="scroller"></i>
    				</div>
    			<div style="width:95%">
    					 <form action="{{url('')}}/prof/open_registraion_date" method="post">
		                @csrf
		                <div class="form-group">
		                    <label>Start Date</label>
		                    <input name="start_date" type="date" class="search_iput" style="display: block;width: 100%">
		                </div>
		                <div class="form-group">
		                    <label>End Date</label>
		                    <input name="end_date" type="date" class="search_iput" style="display: block;width: 100%">
		                </div>
		                <div style="float:right">
		                    <button type="submit" class="btn btn-default">Submit</button>
		                </div>
		            </form>
    			</div>
    				
    	</div>
		</div>
	
	</div>
</div>
@endsection