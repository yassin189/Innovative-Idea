<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Project;
use App\Faculty;
use App\Departments;
use Elasticsearch\ClientBuilder;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome To GPM!';

        $comps = Company::get();
        $projs = Project::get();
        $fcus  = Faculty::get();
        return view('pages.index')->with(['companies'=>$comps,'projects'=>$projs,'fcus'=>$fcus]);
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about',['title'=>$title]);
    }

    public function contact(){
        $title = 'Contact Us';
        return view('pages.contact',['title'=>$title]);
    }

    public function getDepartments($id)
    {
        $depts = Departments::where('fac_id',$id)->get();
        return $depts;
    }

    public function search (Request $request)
    {
        $q = $request->q;
        $all = Project::get();
        $selected = [];
        foreach($all as $project)
        {
            similar_text($q,$project->body,$perc);
            array_push($selected,$perc,$project->id);
        }

        dd($selected);
    }
}

