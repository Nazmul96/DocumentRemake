<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Cases;
use App\Models\Casesections;
use App\Models\Template;
use App\Models\DocumentQueue;
use App\Models\CaseValue;


class CaseController extends Controller
{
    public function caseValidation($request){
        $validatedData = $request->validate([
            'case_name' => 'required',
            'jurisdiction' => 'required',
            'email'=>'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
    }
    public function addCase($id=null)
    {
       if($id != null){
            $section_id=Session::get('section_id');
            if($section_id != $id)
            {
            abort(404);
            }
         $data['section_data']=Casesections::where('id',$id)->first();   
       } 
       else{
         Session::remove('section_id');
         Session::remove('section_name');   
         $data['case_section']=Casesections::all();    
       }
   
       return view('admin.case.addCase',$data);
    }

    public function saveCase(Request $request)
    {
       $this->caseValidation($request); 
       $case=Cases::create($request->all());

    //    $case_id= $case->id;
    //    $case_template=Template::where('section_id',$request->section_id)->get()->toArray();
    //    if(!empty($case_template))
    //    {
    //         foreach($case_template as $case_templates){
    //             $document_queue=new DocumentQueue();
    //             $document_queue->section_id=$request->section_id;
    //             $document_queue->case_id=$case_id;
    //             $document_queue->document_name=$case_templates['template_file'];
    //             $document_queue->save();
    //         }
    //    }
       
       if($request->casewise_section == 1){
         return redirect()->route('backend.sectionwisecase',$request->section_id)->with('case_insert', 'Successfully Case Inserted');
       } 
       return redirect()->route('case.all-case')->with('success', 'Successfully Case Inserted');
    }

    public function caseList()
    {
        $user_id=session::get('user_id');
        //$case=Cases::where('user_id',$user_id)->get();
        $case=Cases::get();
        return view('admin.case.caseList',compact('case'));
    }

    public function section_search(Request $request)
    {
        if (($request->ajax()) && ($request->section_name != null)) {
            $data = Casesections::where('sections_name','LIKE',$request->section_name.'%')->get();
            $output = '';
           
            if (count($data)>0) {
                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';
                foreach ($data as $row) {
                    $output .= '<li class="list-group-item" data-id="'.$row->id.'">'.$row->sections_name.'</li>';
                }
                $output .= '</ul>';
            }else {
                $output .= '<li class="list-group-item">'.'No Data Found'.'</li>';
            }
            return $output;
        }
    }

    public function caseEdit($id)
    {
       $case_edit=Cases::with('Casesections')->where('id',$id)->first();
       return view('admin.case.editCase',compact('case_edit'));
    }


    public function caseDelete($id)
    {
        $delete=Cases::find($id);
        $delete->delete();
        CaseValue::where('case_id',$id)->delete();
        DocumentQueue::where('case_id',$id)->delete();

        return redirect()->route('case.all-case')->with('danger', 'Successfully Case Deleted!');
    }

    public function caseUpdate(Request $request,$id)
    {
        $cases=Cases::find($id);
        $cases->update($request->all());

        return redirect()->route('case.all-case')->with('success', 'Successfully Case Updated!');
    }
}
