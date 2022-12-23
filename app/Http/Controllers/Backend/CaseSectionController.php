<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Casesections;
use App\Models\Cases;
use App\Models\TemplateVariable;
use App\Models\DocumentQueue;
use App\Models\CaseValue;
use App\Models\Template;
use App\Models\TemplateUpdateFile;
use DB;

use function PHPUnit\Framework\isEmpty;

class CaseSectionController extends Controller
{
    public function sectionWiseCase($id){
        $user_id=Session::get('user_id'); 
        $data= [];
        $data['section'] = Casesections::where('user_id',$user_id)->where('id',$id)->first();
        if(empty($data['section'])){
           abort(404); 
        }
        Session::put('section_id',$id);
        Session::put('section_name',$data['section']->sections_name); 
        $data['case'] = Cases::where('user_id',$user_id)->where('section_id',$id)->get();
        $data['id'] = $id;
        return view('admin.sections.sectionwisecase',$data);  
     }
     
     public function caseInfo($id)
     {
         $user_id=Session::get('user_id');
         $section_id=Session::get('section_id');
         $check_case=Cases::where('id',$id)->where('user_id',$user_id)->where('section_id',$section_id)->get();
         if($check_case->isEmpty())
         {
            abort(404);
         }
        $case_data=Cases::with('Casesections')->find($id);
        return view('admin.sections.case_info',compact('case_data')); 
     }

     public function addVariable($id)
     {
        $section_id=$id;
        $user_id=Session::get('user_id');
        $section_id=Session::get('section_id');
        if($section_id != $id)
        {
            abort(404);
        }

        $template_variable = TemplateVariable ::where('user_id',$user_id)->where('section_id',$id)->get()->toArray();
        return view('admin.sections.template_variable',compact('template_variable','section_id'));
     }

     public function saveVariable(Request $request)
     {
        $error = array();
        $insert_error_check=array();
        $success = 0;
        $id = $request->id;

        $user_id=Session::get('user_id'); 
        if(count($id)>0){
           foreach($request->description as $key=>$descriptions){
               $template_id = $request->id[$key];
               if($template_id != null){
                  $error_chk = TemplateVariable::where('section_id',$request->section_id)->where('variable',$request->variable[$key])->get()->toArray();
                  if(!empty($error_chk)){
                     if($error_chk[0]['id'] == $id[$key]){
                        $TemplateVariable =TemplateVariable::find($template_id);  
                        $TemplateVariable->description = $request->description[$key];
                        $TemplateVariable->variable = $request->variable[$key];
                        $TemplateVariable->save();
                        $success = $success+1;
                     }
                     else
                     {
                         $error[] = $request->id[$key];
                     }
                  }
                  else{
                     $TemplateVariable =TemplateVariable::find($template_id);  
                     $TemplateVariable->description = $request->description[$key];
                     $TemplateVariable->variable = $request->variable[$key];
                     $TemplateVariable->save();
                     $success = $success+1;
                  }
                  
               }
               else{
                 $inser_index=array_keys($request->id);
                 $error_chk_new = TemplateVariable::where('user_id',$user_id)->where('section_id',$request->section_id)->where('variable',$request->variable[$key])->get()->toArray();
                 if(empty($error_chk_new)) 
                  {
                     
                     if(($request->description[$key] != null) && ($request->variable[$key] != null))
                     {
                       $Template_Variable =new TemplateVariable();
                       $Template_Variable->user_id = $user_id;
                       $Template_Variable->section_id = $request->section_id;
                       $Template_Variable->description = $request->description[$key];
                       $Template_Variable->variable = $request->variable[$key];
                       $Template_Variable->save();
                       $success = $success+1;
                     }
                  }
                 else
                 {
                     $insert_error_check[]=$inser_index[$key];
                 }
               }
           }
        }
         $data['success'] = $success;
         $data['error'] =$error;
         $data['insert_error'] =$insert_error_check;
         echo json_encode($data); 
     
     }

     public function deleteVariable($variable_id)
     {
         $TemplateVariable = TemplateVariable::find($variable_id); 
         $delete=$TemplateVariable->delete();
         DB::table('case_values')->where('variable_id',$variable_id)->delete();

         if($delete)
         {
            $notification=array(
                  'variable_delete'=>'Variable Successfully deleted!',
            );
            return redirect()->back()->with($notification);
         }
     }

     public function caseValue($id)
     {
         $user_id=Session::get('user_id');
         $section_id=Session::get('section_id');
         $check_case=Cases::where('id',$id)->where('user_id',$user_id)->where('section_id',$section_id)->get();
         if($check_case->isEmpty())
         {
            abort(404);
         } 
        $section_id=Session::get('section_id');
        $case_id=$id;
        $section_data=Casesections::find($section_id);
        $template_variable=TemplateVariable::with('CaseValue')->where('section_id',$section_id)->get()->toArray();
        //$case_value=CaseValue::where('case_id',$id)->get()->toArray();
        //dd($case_value);
        return view('admin.sections.case_value',compact('template_variable','case_id','section_data'));
     }


     public function caseValueSave(Request $request){

        $template_variable_id=$request->template_variable_id; 
        if(!empty($template_variable_id)){
            
         foreach($template_variable_id as $key=>$template_variable_ids) 
          {
              $check_varaiable_value=CaseValue::where('case_id',$request->case_id)->where('variable_id',$template_variable_ids)->get()->toArray();
              $varaiable_name=TemplateVariable::find($template_variable_ids);
              if(empty($check_varaiable_value))  
              {
                  if($request->value[$key] != null)
                  {
                     $CaseValue=new CaseValue();
                     $CaseValue->case_id=$request->case_id;
                     $CaseValue->variable_id=$template_variable_ids;
                     $CaseValue->variable_name=$varaiable_name->variable;
                     $CaseValue->case_value=$request->value[$key];
                     $CaseValue->save();
                  }
              }
              else
              {
                  $data['case_value']=$request->value[$key];
                  $Case_Value=CaseValue::where('case_id',$request->case_id)->where('variable_id',$template_variable_ids)->update($data);
              }

          }
        }

        return redirect()->back()->with('success', 'Template Variable value set!'); 
     }

    public function getCurrentDocs(Request $request)
    {
       $section_id=$request->section_id;
       $current_docs=Template::where('section_id',$section_id)->get();
        
       return response()->json($current_docs);
    }

    public function createDocs(Request $request)
    {
      $dirname = uniqid('', true);
      $zip = new \PhpOffice\PhpWord\Shared\ZipArchive();
      $case_id=$request->case_id;
      //dd($case_id);
      //For Regernate document--------------------
      $regernerate=$request->regernerate;
      if($regernerate != null){
         DocumentQueue::where('case_id',$case_id)->update(['status'=>0]);
      }
    
      $document_queues=DocumentQueue::where('case_id',$case_id)->where('status',0)->where('is_remove',0)->get();

      //dd($document_queues);
       if(!$document_queues->isEmpty()){

         foreach($document_queues as $document_queue){
            $templateInfo =  Template::where('id',$document_queue->template_id)->first();
            $file = public_path('templetes/'.$templateInfo->template_file);
            $doc_variable = CaseValue::where('case_id',$case_id)->get()->toArray();
            // $variable_id=TemplateVariable::where('section_id',$templateInfo->section_id)->pluck('id')->toArray();
            // $doc_variables = [];
            // $case_values=CaseValue::where('case_id',$document_queue->case_id)->whereIn('variable_id',$variable_id)->select('variable_id','case_value')->get()->toArray();

            if(!empty($doc_variable)){
               $newArray = array();
               foreach($doc_variable as $key => $doc_variables) {
                     $newArray[$doc_variables['variable_name']]=$doc_variables['case_value'];
               }
            }
            $phpword = new \PhpOffice\PhpWord\TemplateProcessor($file); 
            foreach($newArray as $key => $val) {
               $phpword->setValue($key,$val);
            }
            $new_template_name =time().'_'.rand(10000, 999999).'.'.$templateInfo->extension_type;
            $destinationPath = public_path().'/templetes/'.$new_template_name;
            $phpword->saveAs($destinationPath);
            DocumentQueue::where('case_id',$case_id)->where('template_id',$document_queue->template_id)->update(['status'=>1]);

            //Converted File insert into Template updated file table---------------
            TemplateUpdateFile::where('case_id',$case_id)->where('template_id',$document_queue->template_id)->delete();
            $Template_update_file=new TemplateUpdateFile();
            $Template_update_file->case_id=$case_id;
            $Template_update_file->template_id=$document_queue->template_id;
            $Template_update_file->updated_file=$new_template_name;
            $Template_update_file->save();
         }
         
         
       }
       $total_case=DocumentQueue::where('case_id',$case_id)->where('status',1)->get();   
      return response()->json([
         'success'=>true,
         'case_id'=>$case_id,
         'regernerate'=>$regernerate,
         'queue_case'=>count($total_case)
      ]); 

    }

    public function documentQueue(Request $request)
    {
       $section_id=$request->section_id;
       $case_id=$request->case_id;
       //$template_id=Template::where('section_id',$section_id)->pluck('id')->toArray();
       $current_docs=Template::where('section_id',$section_id)->get()->toArray();
       if(!empty($current_docs)){
            foreach($current_docs as $current_doc)
            {
               $check_doc=DocumentQueue::where('case_id',$case_id)->where('template_id',$current_doc['id'])->get()->toArray();

               if(empty($check_doc))
               {
                  $document_queue=new DocumentQueue();
                  $document_queue->section_id=$request->section_id;
                  $document_queue->case_id=$case_id;
                  $document_queue->template_id=$current_doc['id'];
                  $document_queue->document_name=$current_doc['template_file'];
                  $document_queue->save();
               }
            }

       }

       return response()->json([
         'success'=>true,
         'case_id'=>$case_id,
         'section_id'=>$section_id
      ]); 
    }

    public function documentProcessQueue(Request $request)
    {
      
      $section_id=$request->section_id;
      $case_id=$request->case_id;

      $document_queue=DocumentQueue::with('template')->where('case_id',$case_id)->where('is_remove',0)->get()->toArray();
      $check_process_template=DocumentQueue::where('case_id',$case_id)->where('status',0)->where('is_remove',0)->get()->toArray();
     
      $output='';
      if(!empty($document_queue)){
         $output='<table class="table table-bordered"><thead><tr><th>Description</th><th>Template Name</th><th></th></tr><thead><tbody>';
         foreach($document_queue as $key=>$document_queues){
            $output.='<tr>';
            $output.='<td>'.$document_queues['template']['description'].'</td>';
            $output.='<td>'.$document_queues['document_name'].'</td>';
            if($document_queues['status'] == 0)
            {
               $output.='<td class="text-danger success_process" data-case="'.$document_queues['case_id'].'" data-template="'.$document_queues['template_id'].'">Processing...</td>';
            }
            else
            {
              $output.='<td data-case="'.$document_queues['case_id'].'" data-template="'.$document_queues['template_id'].'"><span class="text-success success_process_new me-2"></span><a class="btn btn-success btn-sm download_doc">Download</a></td>';
            }
            $output.='</tr>'; 
         }
         $output.='</tbody>';
      }
      $case_data=Cases::with('Casesections')->find($case_id)->toArray();

      return response()->json([
         'success'=>true,
         'case_id'=>$case_id,
         'case_data'=>$case_data,
         'output'=>$output,
         'process_template'=>count($check_process_template)       
      ]);

    }
   
    public function documentDownload(Request $request)
    {
         $template_id=$request->template_id;
         $case_id=$request->case_id;
         $template_file=TemplateUpdateFile::where('case_id',$case_id)->where('template_id',$template_id)->first();
         return response()->json([
            'file_name'=>$template_file->updated_file
         ]);
         // $file_path = public_path().'/templetes/'.'1671087556_460719.docx';
         // return response()->download($file_path);
    }
}
