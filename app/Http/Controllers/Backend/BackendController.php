<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Image;
use App\Models\GlovalSetting;
use App\Models\DocumentInfo;
use App\Models\DocumentQueue;
use App\Models\DocumentWord;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Casesections;
use App\Models\Cases;
use App\Models\User;
use Auth;

class BackendController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('backend.dashboard');
        } else {
            return redirect()->route('login');
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
     
        $data= [];
        $user_id=Session::get('user_id');
        $sections = Casesections::where('user_id',$user_id)->orderBy('id','desc')->take(9)->get();
        $newsc = [];
        foreach($sections as $sc){
            $sc->count  =  Cases::where('section_id',$sc->id)->count();
            $newsc[] = $sc;
        }

        $data['sections'] = $newsc;
        $data['cases']=Cases::where('user_id',$user_id)->orderBy('id','desc')->take(5)->get();
        return view('/admin/dashboard/dashboard',$data);
    }
    
     public function allSections()
    {
        $user_id=Session::get('user_id');
        $data['sections'] = Casesections::where('user_id',$user_id)->get();
        return view('/admin/sections/sectionsall',$data);  
    } 
    public function SaveSections(Request $request){

        $user_id=Session::get('user_id'); 

        $validatedData = $request->validate([
            'sections_name' => 'required',
        ]); 
  
        $section_check=Casesections::where('user_id',$user_id)->where('sections_name',$request->sections_name)->get();

        if(count($section_check) > 0){

            return redirect()->back()->with('section_exist', 'The sections name has already been taken');
        }

        $newSection = new Casesections();
        $newSection->user_id = $user_id;
        $newSection->sections_name = $request->sections_name;
        $newSection->save();
        
        $notification=array(
        'message'=>'Section Successfully Added!',
        'done'=>'success',
        );
        
        return redirect()->route('backend.allsections')->with($notification);
        
    }    
   

    public function addSections()
    {
        return view('/admin/sections/addsections',[]);  
    }
        
    public function editSections($id){
        $data= [];
        $data['section'] = Casesections::where('id',$id)->first();
        return view('/admin/sections/editsections',$data);  
    } 
 

   
    public function updateSections($id,Request $request){
        $user_id=Session::get('user_id');
        $validatedData = $request->validate([
            'sections_name' => 'required',
        ]);

        $case_section=Casesections::find($id);
        if($case_section->sections_name != $request->sections_name){
            
            $section_check=Casesections::where('user_id',$user_id)->where('sections_name',$request->sections_name)->get();

            if(count($section_check) > 0){
    
                return redirect()->back()->with('section_exist', 'The sections name has already been taken');
            }
        }
        Casesections::where('id',$id)->update(['sections_name'=>$request->sections_name]);
        $notification=array(
        'message'=>'Section Successfully updated!',
        'done'=>'success',
        );
        return redirect()
        ->route('backend.allsections')
        ->with($notification);
        
    }  
    
    public function deleteSections($id){
        Casesections::where('id',$id)->delete();
        $notification=array(
        'message'=>'Section Successfully deleted!',
        'success'=>'success',
        );
        return redirect()
        ->route('backend.allsections')
        ->with($notification);
    } 

    public function myAccount()
    {
       $user_id=Session::get('user_id');
       $user_data=User::find($user_id);
       return view('admin/profile/my_account',compact('user_data'));
    }

    protected function userupdateValidate($request){
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);
    }

    protected function userupdatenewValidate($request){
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
        ]);

    }

    public function myaccountUpdate(Request $request)
    {
        $user_id=$request->user_id;
        $password=$request->password;
        $re_password=$request->password_confirmation;
        $user=User::find($user_id)->toArray();

        if($user['email'] == $request->email)
        {
            $this->userupdateValidate($request);
        }
        else
        {
            $this->userupdatenewValidate($request);
        }

        if(($password != '') && ($re_password != ''))
        {
            if($password == $re_password)
            {
                $user=User::find($user_id); 
                $user->first_name=$request->first_name;
                $user->last_name=$request->last_name;
                $user->name=$request->first_name.' '.$request->last_name;
                $user->email=$request->email;
                $user->password=Hash::make($request->password);
                $user->save();
    
                return redirect()->route('backend.my_account')->with('success', 'Successfully Updated');
            }
            else
            {
               return redirect()->route('backend.my_account')->with('do_not_match', 'Password did not match');
            }
        }
        else
        {
            $user=User::find($user_id); 
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->name=$request->first_name.' '.$request->last_name;
            $user->email=$request->email;
            $user->save();

            return redirect()->route('backend.my_account')->with('success', 'Successfully Updated');
        }
    }
        
}
