<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Project;
use App\Tools;
use DB;
use Elasticsearch\Client;
use Monolog\Handler\ElasticSearchHandler;
use Validator;

class ProjectsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = project::all();
        // return project::where('title', 'project Two')->get();
        // $projects = DB::select('SELECT * FROM projects');
        // $projects = project::orderBy('title','desc')->take(1)->get();
        // $projects = project::orderBy('title','desc')->get();

        $projects = Project::orderBy('created_at','desc')->paginate(10);
        return view('projects.index')->with('projects', $projects);
    }
    public function gp_project_view()
    {
        return view('projects.gp_project');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tools = Tools::get();
        return view('projects.create')->with('tools',$tools);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:191',
            'body' => 'required',
            'tools'=>'required',
            'documentaion'=>'mime:pdf',
            'Code'=>'mime:zip'
        ]);

       

        // Create project
        $project = new Project;
        $project->title = $request->input('title');
        $project->body =  strip_tags($request->input('body'));
        $toolsString='';

        if($request->tools)
        {
            foreach($request->tools as $tool)
            {
                $toolsString .= $tool.",";
                $Plus1Tool = Tools::where('name',strtolower($tool))->first();
                $Plus1Tool->points += 1 ;
                $Plus1Tool->save();
            }
            $project->tools = $toolsString;
        }
        else 
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
        $project->is_gp = 0;
        $project->save();

        return redirect('/dashboard')->with('success', 'Project Created');
    }

    public function gp_project(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);



        // Create project
        $project = new Project;
        $project->title = $request->input('title');
        $project->body =  strip_tags($request->input('body'));
        $project->user_id = auth()->user()->id;
        $project->is_gp = 0;
        $project->save();

        return redirect('/dashboard')->with('success', 'Project Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show')->with('project', $project);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);

        // Check for correct user
        if(auth()->user()->id !==$project->user_id){
            return redirect('/projects')->with('error', 'Unauthorized Page');
        }

        return view('projects.edit')->with('project', $project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);


        // Create project
        $project = Project::find($id);
        $project->title = $request->input('title');
        $project->body = $request->input('body');

        $project->save();

        return redirect('/dashboard')->with('success', 'Project Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);

        // Check for correct user
        if(auth()->user()->id !==$project->user_id){
            return redirect('/projects')->with('error', 'Unauthorized Page');
        }
        
        $project->delete();
        return redirect('/dashboard')->with('success', 'Project Removed');
    }
    public function search(){
        $es = new Client([
            'hosts'=>['127.0.0.1'],
        ]);
    }
}
