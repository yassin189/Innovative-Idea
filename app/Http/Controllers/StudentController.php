<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Student;
use App\Team;
use App\User;
use App\Professor;
use App\TeamRequestDoctor;
use App\Tools;

use Illuminate\Support\Facades\Crypt;

class StudentController extends Controller
{	

	  public function __construct()
    {
        $this->middleware('auth');        
    }


    public function register_gp_SLeader (){

//        $projects[] = new Project;
//        $projects = Project::where('user_id',auth()->user()->id)->get();
//
//    	if($projects->count() > 0){
//            foreach ($projects as $p) {
//                if($p->is_gp == 1){
//                    return redirect('/');
//                }
//            }
//    	}

        $studentL = Student::get()->where('user_id',auth()->user()->id)->first();

    	return view('students.register_gp_SLeader',['studentL'=>$studentL]);
    }

    public function register_gp_SLeader_post (Request $request){
    	
       
        $teamExist = Team::where('leader_id' , auth()->user()->id)->first();

        if($teamExist == null) {
            $team = new Team;
            $team->leader_id = auth()->user()->id;
            $team->save();

            $studentL = Student::get()->where('user_id', auth()->user()->id)->first();
            $studentL->team_id = Team::orderBy('created_at', 'DESC')->first()->id;
            $studentL->save();
        }
		return redirect('student/register_gp_Members');
    }

    public function register_gp_Members (){

    	return view('students.register_gp_Members');
    }

    public function register_gp_Members_post (Request $request){

    	$this->validate($request, [
            'name_0' => 'required',
            'email_0' => 'unique:users,email,required',
            'student_id_0' => 'required',
            'name_1' => 'required',
            'email_1' => 'unique:users,email,required',
            'student_id_1' => 'required',
            'name_2' => 'required',
            'email_2' => 'unique:users,email,required',
            'student_id_2' => 'required',
            'name_3' => 'required',
            'email_3' => 'unique:users,email,required',
            'student_id_3' => 'required',

        ],[],[

        	"name_0" => "First Member's Name",
        	"email_0" => "First Member's E-mail",
        	"student_id_0" => "First Member's ID",
        	"name_1" => "Second Member's Name",
        	"email_1" => "Second Member's E-mail",
        	"student_id_1" => "Second Member's ID",
            "name_2" => "Third Member's Name",
            "email_2" => "Third Member's E-mail",
            "student_id_2" => "Third Member's ID",
            "name_3" => "Fourth Member's Name",
            "email_3" => "Fourth Member's E-mail",
            "student_id_3" => "Fourth Member's ID",
        ]);


        $studentL = Student::get()->where('user_id',auth()->user()->id)->first();
        Student::where('team_id',$studentL->team_id)->where('user_id' , '!=' , auth()->user()->id)->delete();


        $user_0 = new User;
        $user_0->name = $request->input('name_0');
        $user_0->email = $request->input('email_0'); 
		$user_0->password = bcrypt("".rand(10000000,mt_getrandmax()));
        $user_0->type = 's';
        $user_0->save();

        $student_0 = new Student;
        $student_0->user_id = $user_0->id; 
        $student_0->student_id = $request->input('student_id_0');
        $student_0->faculty_id = $studentL->faculty_id;
        $student_0->dept_id = $studentL->dept_id;
        $student_0->team_id = $studentL->team_id;
        $student_0->save();


		$user_1 = new User;
        $user_1->name = $request->input('name_1');
        $user_1->email = $request->input('email_1'); 
		$user_1->password = bcrypt("".rand(10000000,mt_getrandmax()));
        $user_1->type = 's';
        $user_1->save(); 

        $student_1 = new Student;
        $student_1->user_id = $user_1->id; 
        $student_1->student_id = $request->input('student_id_1');
        $student_1->faculty_id = $studentL->faculty_id;
        $student_1->dept_id = $studentL->dept_id;
        $student_1->team_id = $studentL->team_id;
        $student_1->save();

		$user_2 = new User;
        $user_2->name = $request->input('name_2');
        $user_2->email = $request->input('email_2'); 
		$user_2->password = bcrypt("".rand(10000000,mt_getrandmax()));
        $user_2->type = 's';
        $user_2->save(); 

        $student_2 = new Student;
        $student_2->user_id = $user_2->id; 
        $student_2->student_id = $request->input('student_id_2');
        $student_2->faculty_id = $studentL->faculty_id;
        $student_2->dept_id = $studentL->dept_id;
        $student_2->team_id = $studentL->team_id;
        $student_2->save();


		$user_3 = new User;
        $user_3->name = $request->input('name_3');
        $user_3->email = $request->input('email_3'); 
		$user_3->password = bcrypt("".rand(10000000,mt_getrandmax()));
        $user_3->type = 's';
        $user_3->save();

        $student_3 = new Student;
        $student_3->user_id = $user_3->id; 
        $student_3->student_id = $request->input('student_id_3');
        $student_3->faculty_id = $studentL->faculty_id;
        $student_3->dept_id = $studentL->dept_id;
        $student_3->team_id = $studentL->team_id;
        $student_3->save();
    	
		return redirect('student/register_gp_Project');
    }

    public function register_gp_Project(){

        $prof = Professor::whereHas('DoctorRegistration'
            , function ($query)   {
                    $query->where('start_date', '<=', date("Y-m-d"));
                    $query->where('end_date', '>=', date("Y-m-d"));

            })->get();
        $tools = Tools::get();
    	return view('students.register_gp_Project')->with([
    	    'doctors'=>$prof,
            'tools'=>$tools
        ]);
    }

    public function similar_proj($title , $body){
        $Projectss = Project::get();
        $a=array();

        foreach ($Projectss as $Projects) {
            similar_text(strip_tags($body), $Projects->body, $percent);
            if($percent>40)
                array_push($a,$Projects->id);
        }

        $ProjectsEX = Project::whereIn('id' , $a)->get();

        $code = view('projects.getProjectsAjax', compact('ProjectsEX'))->render();

        return response(['status' => 'ok',
            'code' => $code,
        ]);
    }

    public function register_gp_Project_post(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|max:191',
            'body' => 'required',
            'tools' => 'required',
            'documentaion' => 'mime:pdf',
            'Code' => 'mime:zip',
            'prof' => 'required',
            'prof2' => 'required',
            'prof3' => 'required',
        ]);



    	$project = new Project;

        $project->title = $request->input('title');
        $project->body =  strip_tags($request->input('body'));
        $toolsString='';

        if($request->tools)
        {
            foreach($request->tools as $tool)
            {
                $toolsString =  $toolsString.",".$tool;
                $Plus1Tool = Tools::where('name',strtolower($tool))->first();
                $Plus1Tool->points += 1 ;
                $Plus1Tool->save();
            }
            $project->tools = $toolsString;
        }else if ($request->new_tools)
        {
            if($request->new_tools){

                $new_arr =explode (",", $request->new_tools);
                if($new_arr >=1)
                {
                    foreach($new_arr as $tool)
                    {
                        $newStringTool = strtolower($tool);
                        if(Tools::where('name',$newStringTool)->first())
                        {
                            $foundTool = Tools::where('name',$newStringTool)->first();
                            $foundTool += 1;
                            $foundTool->save();
                        }
                        else{
                            $newTool = new Tools();
                            $newTool->name = strtolower($newStringTool);
                            $newTool->points = 1;
                            $newTool->save();
                        }
                    }
                }
            }
        }
        else
        {
            return redirect('/project/create')->with('error','Please Select Tools');
        }
        $project->user_id = auth()->user()->id;
        if($request->documentaion)
        {
            $file = $request->documentaion;
            $file_name = auth()->user()->id . time() . $file->getClientOriginalName();

            $file_path = '/documents';

            $file->move($file_path, $file_name);

            $project->documentaion = $file_name ;
        }
        else
        {
            $project->documentaion = 'No Document Found';
        }

        if($request->Code)
        {
            $file = $request->Code;
            $file_name = auth()->user()->id . time() . $file->getClientOriginalName();

            $file_path = '/documents';

            $file->move($file_path, $file_name);

            $project->ZipCodeFile = $file_name ;
        }
        else
        {
            $project->ZipCodeFile = 'No Document Found';
        }
        $project->is_gp = 1;
        $project->save();

        $studentL = Student::get()->where('user_id',auth()->user()->id)->first();

        $team = Team::get()->where('id', $studentL->team_id)->first();
        //$team->prof_id = $request->input('prof');
        $team->project_id = $project->id;
        $team->save();
        TeamRequestDoctor::where('team_id',$studentL->team_id)->delete();

        $TeamRequestDoctor = new TeamRequestDoctor();
        $TeamRequestDoctor->team_id = $studentL->team_id;
        $TeamRequestDoctor->project_id = $project->id;
        $TeamRequestDoctor->prof_id = $request->input('prof');
        $TeamRequestDoctor->save();
        if($request->input('prof') != $request->input('prof2')) {
            $TeamRequestDoctor = new TeamRequestDoctor();
            $TeamRequestDoctor->team_id = $studentL->team_id;
            $TeamRequestDoctor->project_id = $project->id;
            $TeamRequestDoctor->prof_id = $request->input('prof2');
            $TeamRequestDoctor->save();
        }
        if($request->input('prof') != $request->input('prof2')&& $request->input('prof3')!=$request->input('prof2')
        &&$request->input('prof')!= $request->input('prof3')) {
            $TeamRequestDoctor = new TeamRequestDoctor();
            $TeamRequestDoctor->team_id = $studentL->team_id;
            $TeamRequestDoctor->project_id = $project->id;
            $TeamRequestDoctor->prof_id = $request->input('prof3');
            $TeamRequestDoctor->save();
        }
    	return redirect('/dashboard');
    }

}
