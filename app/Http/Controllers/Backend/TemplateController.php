<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\DocumentQueue;
use App\Models\TemplateUpdateFile;
use File;

class TemplateController extends Controller
{
   public function templateList($id)
   {
      $section_id=Session::get('section_id');
      if($section_id != $id)
      {
         abort(404);
      }
      
      $templetes= Template::with(['getSection'])->where('section_id',$id)->get()->toArray();
      $section_id=$id;
      return view('admin.sections.template.templateList',compact('templetes','section_id'));
   }

   public function uploadTemplate($id)
   {
      $section_id=Session::get('section_id');
      if($section_id != $id)
      {
         abort(404);
      }
      $data['id']=$id;  
      return view('admin.sections.template.uploadTemplate')->with('data',$data);
   }

   public function uploadsTemplate(Request $request)
   {
  
      $rules=[
         'description.*'=>'required',
         'templatefiles.*'=>'mimes:docx',
      ];

      $validator=validator::make($request->all(),$rules);
      // $request->validate([
      //    'description.*'=>'required',
      //    'templatefiles.*'=>'mimes:jpg,jpeg,png',
      // ]);

      if($validator->fails())
      {
           return response()->json([
               "keys"=>$validator->errors()->keys(),
               "error"=>$validator->errors()->all()
            ]);
           
      }
 
      $template_file = $request->file('templatefiles');

      $all_files=[];
      $file_extension=[];
      if ($request->hasFile('templatefiles')) {
         foreach($template_file as $template_files)
         {
            $destinationPath = public_path().'/templetes';
            $fileType = $template_files->getClientOriginalExtension();
            $new_templete_name = time() . '_' . rand(10000, 999999) . '.' . $fileType;
            $template_files->move($destinationPath,$new_templete_name);
            $all_files[]=$new_templete_name;
            $file_extension[]=$fileType;
         }
      }
     //dd($all_files);
      foreach($request->description as $key=>$descriptions){
            $templete_info = new Template();
            $templete_info->section_id = $request->section_id;
            $templete_info->description = $descriptions;
            $templete_info->template_file =$all_files[$key];
            $templete_info->extension_type=$file_extension[$key];
            $templete_info->save();
      }
      
      return response()->json([
         'success'=>true,
         'section_id'=>$request->section_id
      ]);

   }

   public function templeteDelete($id){
      $templete = Template::find($id);

   
      if ($templete->template_file != '') {
         $image_path=public_path().'/templetes/'.$templete->template_file;
         if (File::exists($image_path)) {
             unlink($image_path);
         }
      } 
      $delete=$templete->delete();
     // DocumentQueue::where('template_id',$id)->delete(); 
      //TemplateUpdateFile::where('template_id',$id)->delete();

      $queue_data=DocumentQueue::whereIn('template_id',[$id])->get();
      $template_update=TemplateUpdateFile::where('template_id',[$id])->get();
     
      if(!$queue_data->isEmpty()){
         DocumentQueue::whereIn('template_id',[$id])->update(['is_remove'=>1]);
      }
      if(!$template_update->isEmpty()){
         TemplateUpdateFile::whereIn('template_id',[$id])->update(['is_remove'=>1]);
      }
      if($delete)
      {
         $notification=array(
               'template_delete'=>'Templete Successfully deleted!',
         );
         return redirect()->back()->with($notification);
      }
   }

   public function templatePreview($id)
   {
      $templete = Template::find($id);
      return view('admin.sections.template.previewTemplate',compact('templete'));
   }
}
