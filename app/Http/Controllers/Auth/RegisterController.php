<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Faculty;
use App\Professor;
use App\Student;
use App\Company;
use App\Departments;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:8|confirmed',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => bcrypt($data['password']),
        //     'phone' => $data['phone'],
        // ]);

        //Register AS FACUlTY

        if($data['submit'] == 'fac')
        {
               

                $fac = new User();
                $fac->name=$data['name_fa'];
                $fac->email=$data['email_fa'];
                $fac->password=bcrypt($data['password_fa']);
                $fac->phone=$data['phone_fa'];
                $fac->type="f";
                $fac->save();

                $newFac = new Faculty();
                $newFac->user_id = $fac->id;
                $newFac->little_name = $data['l-name_fa'];
                $newFac->sub_domain = $data['sub-domain_fa'];
                $newFac->save();

                return $fac;
        }
        elseif ($data['submit'] == 'prof')
        {
           
                $prof = new User();
                $prof->name=$data['name_prof'];
                $prof->email=$data['email_prof'];
                $prof->password=bcrypt($data['password_prof']);
                $prof->phone=$data['phone_prof'];
                $prof->type="p";
                $prof->save();

                $newPro = new Professor();
                $newPro->user_id = $prof->id;
                $newPro->faculty_id = $data['fac_name_prof'];
                $newPro->dept_id = $data['dept_prof'];
                $newPro->save();

                $dep = Departments::where('id',$data['dept_prof'])->first();
                $dep->number_of_doctors = $dep->number_of_doctors+1;
                $dep->save(); 
                return $prof;
        }
        elseif ($data['submit'] == 'stu')
        {
          
                $std = new User();
                $std->name=$data['name_stu'];
                $std->email=$data['email_stu'];
                $std->password=bcrypt($data['password_stu']);
                $std->phone=$data['phone_stu'];
                $std->type="s";
                $std->save();

                

                $newStd = new Student();
                $newStd->user_id = $std->id;
                $newStd->student_id = $data['student_id_stu'];
                $newStd->faculty_id = $data['st_fac_name_stu'];
                $newStd->dept_id = $data['st_fac_dept_stu'];
                $newStd->save();

                $dep = Departments::where('id',$data['st_fac_dept_stu'])->first();
                $dep->number_of_students = $dep->number_of_students+1;
                $dep->save(); 
                return $std; 
        }
        elseif ($data['submit'] == 'comp') {

                $comp = new User();
                $comp->name=$data['name_com'];
                $comp->email=$data['email_com'];
                $comp->password=bcrypt($data['password_com']);
                $comp->phone=$data['phone_com'];
                $comp->type="c";
                $comp->save();

                $Company = new Company();
                $Company->user_id = $comp->id;
                $Company->description = $data['desc_com'];
                $Company->address = $data['Address_com'];
                $Company->save();
                return $comp ; 
        }

    }
}
