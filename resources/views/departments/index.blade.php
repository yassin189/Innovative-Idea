@extends('layouts.app')

@section('content')
<div class="container">
	<h3>Welcome, {{auth()->user()->name}}</h3>
	<small style="color:#B7494C">Only you can edit this data or access this page</small>
	<a href="#" class="btn btn-default" style="float: right" data-toggle="modal" data-target="#AddNewOne"> <i class="fas fa-plus-square"> Add New Department</i></a>
	<div style="background-color: white;">
		<table class="table table-striped">
			<tr style="text-align: center">
					<td>
						Department Name
					</td>
					<td>
						Department Short Name
					</td>
					<td>
						No.Of Students
					</td>
					<td>
						No.Of Doctors
					</td>
					<td>
						Opertaions
					</td>
			</tr>
			@foreach($departments as $key=>$department)
					<tr style="text-align: center">
						<td>
							{{$department->name}}
						</td>
						<td>
							{{$department->short_name}}
						</td>
						<td>
							{{$department->number_of_students}}
						</td>
						<td>
							{{$department->number_of_doctors}}
						</td>
						<td>
							<a href="#" data-toggle="modal" data-target="#EditOne{{$key}}"><i class="fas fa-edit"></i></a>
							<a href="#" ><i class="fas fa-trash"></i></a>
						</td>
					</tr>
			@endforeach
		</table>
		<div class="modal fade" id="AddNewOne" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<form action="{{url('/')}}/departments/add" method="post">
		       	@csrf
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       
		       		<div class="row">
		       			<div class="col-lg-6">
		       				<div class="form-group">
				       			<label>Department Name</label>
				       			<input type="text" name="depName" required maxlength="191" class="search_iput" style="display: block;width: 100%">
				       		</div>
		       			</div>
		       			<div class="col-lg-6">
		       				<div class="form-group">
				       			<label>Department Short Name</label>
				       			<input type="text" name="ShortdepName" required maxlength="191" class="search_iput" style="display: block;width: 100%">
				       		</div>
		       			</div>
		       		</div>
		       
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Add</button>
		      </div>
		 	 </form>
		    </div>
		  </div>
		</div>
		@foreach($departments as $key=>$department)
			<div class="modal fade" id="EditOne{{$key}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		    	<form action="{{url('/')}}/departments/edit" method="post">
		       	@csrf
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		       
		       		<div class="row">
		       			<div class="col-lg-6">
		       				<div class="form-group">
				       			<label>Department Name</label>
				       			<input type="text" name="depName" required maxlength="191" class="search_iput" style="display: block;width: 100%" value="{{$department->name}}">
				       		</div>
		       			</div>
		       			<div class="col-lg-6">
		       				<div class="form-group">
				       			<label>Department Short Name</label>
				       			<input type="text" name="ShortdepName" required maxlength="191" class="search_iput" style="display: block;width: 100%" value="{{$department->short_name}}">
				       		</div>
		       			</div>
		       			<input type="hidden" name="id" value="{{$department->id}}">
		       		</div>
		       
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Edit</button>
		      </div>
		 	 </form>
		    </div>
		  </div>
		</div>
		@endforeach
	</div>
</div>
@endsection