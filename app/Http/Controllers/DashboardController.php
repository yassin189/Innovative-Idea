<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $projectIdeas = Project::all()->where('user_id','=',$user_id);
            //->where('is_gp', '=' , 0);
       // $gp = Project::all()->where('user_id','=',$user_id)->where('is_gp', '=' , 1)->first();

//        if($user->type == 's'){
//
//            dd($gp);
//            if(!empty($gp)){
//
//
//
//            }
//        }
        return view('dashboard',['projects'=>$projectIdeas]);
        //return view('dashboard',['projects'=>$projectIdeas]);
    }

    public function SubmitProject(Request $request){
        $project  = new Project;
        $project->title = $request->title;
        $project->body = $request->body;
        $project->is_gp = 1;
        $project->user_id =  Auth::user()->id;
        $project->save();

        return back();

    }

}
