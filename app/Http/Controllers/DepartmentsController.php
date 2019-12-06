<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Departments;
class DepartmentsController extends Controller
{
     public function __construct()
	    {
	        $this->middleware('auth');        
	    }
	public function index()
	{
		if(auth()->user()->type == 'f')
		{
			$departments = Departments::where('fac_id',auth()->user()->id)->get();
			return view('departments.index')->with('departments',$departments);	
		} 
		else
		{
			return redirect('/');
		}
		
	}
	public function store(Request $request)
	{
		$this->validate($request, [
            'depName' => 'required|string|max:191',
            'ShortdepName'=>'required|string|max:191',
        ]);

        $Department = new Departments();
        $Department->fac_id = auth()->user()->id;
        $Department->name = $request->depName;
        $Department->short_name = $request->ShortdepName;
        $Department->number_of_students = 0;
        $Department->number_of_doctors = 0;
        $Department->save();

        return redirect('/departments');
	}

	public function edit(Request $request)
	{
		$this->validate($request, [
            'depName' => 'required|string|max:191',
            'ShortdepName'=>'required|string|max:191',
        ]);

        $Department = Departments::where('id',$request->id)->first();
        $Department->fac_id = auth()->user()->id;
        $Department->name = $request->depName;
        $Department->short_name = $request->ShortdepName;	
        $Department->save();

        return redirect('/departments');
	}
}
