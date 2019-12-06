<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use App\Faculty;
use App\Departments;
use App\Student;
use App\Professor;
use App\DoctorRegistration;
class ProfileController extends Controller
{
      public function __construct()
	    {
	        $this->middleware('auth');        
	    }
	  public function index()
	  {
	  	if(auth()->check()){
          $user_id = auth()->user()->id;
          $user = User::find($user_id);

          if($user->type == 'a'){
             return view('admin.profile');
          }

          elseif ($user->type == 's') {
             return view('students.profile');
          }

          elseif ($user->type == 'p') {
          	$prof = Professor::where('user_id' , auth()->user()->id)->first();
          	$Registration = DoctorRegistration::where('prof_id',$prof->id)->first();
             return view('doctors.profile')->with('registerationTime',$Registration);
          }

          elseif ($user->type == 'f') {
              $faculty = Faculty::where('user_id',$user->id)->first();
              $departments = Departments::where('fac_id',$faculty->id)->get();
              $students = Student::where('faculty_id',$faculty->id)->get();
              $professors = Professor::where('faculty_id',$faculty->id)->get();
              return view('faculty.profile')->with(['faculty'=>$faculty,'departments'=>$departments,'students'=>$students,'professors'=>$professors]);
          }
          else if($user->type == "c")
          {
          	return view('company.profile');
          }

        }
	  }

	  public function upload(Request $request)
	  {
	  	 $this->validate($request, [
            'old_password' => 'required',
            'name'=>'string|max:191',
            'email'=>'string|email',
            'phone'=>'string|max:191',
        ]);

	  	 $User = User::where('id',auth()->user()->id)->first();

	  	 if(Hash::check($request->old_password,$User->password ))
	  	 {
	  	 	$User->name = $request->name;
	  	 	$User->email = $request->email;
	  	 	$User->phone = $request->phone;
	  	 	$User->password = Hash::make($request->new_password);
	  	 	$User->save();
	  	 	return redirect('/profile')->with('success','Updated Successfully');
	  	 }
	  	 else
	  	 {
	  	 	return redirect('/profile')->with('error','Your Password is incorrect');
	  	 }
	  }

	  public function uploadfaculty(Request $request)
	  {
	  	 $this->validate($request, [
            'old_password' => 'required',
            'little_name'=>'string|max:191',
            'sub_domain'=>'string|max:191',
        ]);
	  	$User = User::where('id',auth()->user()->id)->first();

	  	 if(Hash::check($request->old_password,$User->password ))
	  	 {
	  	 	$Faculty = Faculty::where('user_id',$User->id)->first();
	  	 	
	  	 	$Faculty->little_name = $request->little_name;
	  	 	$Faculty->sub_domain = $request->sub_domain;
	  	 	$Faculty->summary = $request->summary;
	  	 	$Faculty->save();
	  	 	return redirect('/profile')->with('success','Updated Successfully');
	  	 }
	  	 else
	  	 {
	  	 	return redirect('/profile')->with('error','Your Password is incorrect');
	  	 }
	  }
}
