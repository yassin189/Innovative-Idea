<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use App\Professor;
use App\DoctorRegistration;
use Illuminate\Support\Facades\Auth;
use App\TeamRequestDoctor;
class ProfessorController extends Controller
{
    public function open_registraion_date(){
        $prof = Professor::where('user_id' , Auth::user()->id)->first();
        $DoctorRegistration = DoctorRegistration::where('prof_id',$prof->id)->get();
        return view('doctors.open_registraion_date')->with([
            'DoctorRegistration'=>$DoctorRegistration,
        ]);
    }

    public function open_registraion_date_post(Request $request){
        $this->validate($request, [
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $DoctorRegistration = new DoctorRegistration();
        $DoctorRegistration->start_date = $request->start_date;
        $DoctorRegistration->end_date = $request->end_date;
        $prof = Professor::where('user_id' , Auth::user()->id)->first();
        $DoctorRegistration->prof_id = $prof->id;

        $DoctorRegistration->save();
        session()->flash('success', 'Added Successfully');
        return back();
    }

    public function student_requests(){
        $prof = Professor::where('user_id' , Auth::user()->id)->first();

        $TeamRequestDoctor = TeamRequestDoctor::where('prof_id',$prof->id)->whereHas('team'
            , function ($query)   {
                    $query->where('prof_id', '=', null);
            })
            ->where('approved','=',null)
            ->get();
        $acceptedRequests = TeamRequestDoctor::where('prof_id',$prof->id)


            ->whereHas('team'
            , function ($query) use($prof)  {
                $query->where('prof_id', '=', $prof->id);
            })
            ->get();

        return view('doctors.student_requests')->with([
            'TeamRequestDoctor'=>$TeamRequestDoctor,
            'acceptedRequests'=>$acceptedRequests,
        ]);
    }

    public function student_requests_post(Request $request){
        $prof = Professor::where('user_id' , Auth::user()->id)->first();
        $team = Team::where('id',$request->team_id)->first();
        $TeamRequestDoctor = TeamRequestDoctor::where('team_id',$request->team_id)
            ->where('prof_id',$prof->id)
            ->first();

        if($request->accept ==1) {
            $team->prof_id = $prof->id;
            $TeamRequestDoctor->approved = 1;
        }else{
            $TeamRequestDoctor->approved = 0;
        }
        $team->save();
        $TeamRequestDoctor->save();
        session()->flash('success', 'Added Successfully');

        return back();
    }

    public function team($id){
        $team = Team::where('id',$id)->first();

        return view('doctors.team_details')->with([
            'team'=>$team,
        ]);
    }
}
