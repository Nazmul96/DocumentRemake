<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Image;
use App\Models\GlovalSetting;
use App\Models\DocumentInfo;
use App\Models\DocumentQueue;
use App\Models\DocumentWord;
use Illuminate\Support\Facades\Session;

class DocumentController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function addDocument()
    {
return view('/admin/documents/newfile');
      // return view('/admin/documents/add-documents');
    }

    public function saveDocumentUpload(Request $request){
        
        ///echo '<pre>';
        //print_r($request->all());
        //die();
        
        // echo $request->file('file')->getClientOriginalName();die();
        // print_r($request->all());die();
        // echo public_path();die();
        $user_id = Session::get('user_id');

        $file = $request->file('file');
        
        $original_name = $request->file('file')->getClientOriginalName();
        $destinationPath = public_path().'/documents';
        $fileType = $file->getClientOriginalExtension();
        $new_document_name = time() . '_' . rand(10000, 999999) . '.' . $fileType;
        
        // $file->move($destinationPath,$file->getClientOriginalName());
        $file->move($destinationPath,$new_document_name);

        $document_info = new DocumentInfo();
        $document_info->document_name = $new_document_name;
        $document_info->orginal_document_name = $original_name;
        $document_info->extension_type = '.'.$fileType;
        $document_info->user_id = $user_id;
        $document_info->save();
        
        $insert_id = $document_info->id;//document_id

        $document_queue = new DocumentQueue();
        $document_queue->document_id = $insert_id;
        $document_queue->document_name = $new_document_name;
        //$document_queue->extension_type = '.'.$fileType;
        $document_queue->status = 1;
        $document_queue->save();

        echo 1;
       
        
    }

    public function documentList(){

        $document_info_model = new DocumentInfo();

        $document_list = DocumentInfo:: with(['getUser','documentQueue'])->get()->toArray();

        // echo "<pre>";print_r($document_list);die();
        return view('/admin/documents/document-list')->with('documents', $document_list);
    }

    public function documentDelete($id){
        $document = DocumentInfo::find($id); 
        $delete=$document->delete();

        if($delete)
        {
            $notification=array(
                'message'=>'Document Successfully deleted!',
                'success'=>'success',
            );
            return redirect()->back()->with($notification);
        }
    }

    public function addWords($id){
        $document_word = DocumentWord ::where('document_id',$id)->get()->toArray();

        return view('/admin/documents/add-words')->with('doc_id', $id)->with('document_words', $document_word);
    }

    public function documentWordSave(Request $request){

        $error = array();
        $succes = 0;
        $document_id = $request->document_id;
        // echo "<pre>";print_r($request->all());die();
        if(count($request->word_name)>0){

            foreach($request->word_name as $key=>$word_name){
                $word_id = $request->word_id[$key];
                if(!empty($word_id)){
                    $error_chk = GlovalSetting::where('name',$request->word_name[$key])->first()->toArray();
                    // if(!empty($error_chk)){
                    //     if($error_chk['id'] == $word_id){
                    //         $glovalSetting = GlovalSetting::find($word_id);
                    //         $glovalSetting->name = $request->word_name[$key];
                    //         $glovalSetting->value = $request->word_value[$key];
                    //         $glovalSetting->type = $request->type[$key];
                    //         $glovalSetting->update();

                    //         $success = $success+1;
                    //     }else{
                    //         $error[] = $word_id;
                    //     }
                    // }

                }else{
                    $error_chk = DocumentWord::where('document_id',$document_id)->where('name',$request->word_name[$key])->get()->toArray();
       
                    if(empty($error_chk)){
                        if(!empty($word_name) && !empty($request->word_value[$key]) && !empty($request->type[$key])){
                            $glovalSetting = new DocumentWord();  
                            $glovalSetting->name = $word_name;
                            $glovalSetting->value = $request->word_value[$key];
                            $glovalSetting->type = $request->type[$key];
                            $glovalSetting->document_id = $document_id;
                            $glovalSetting->save();
                            $succes = $succes+1;
                        }
                    }else{
                        $error[]=$key+1;
                    }
                }
                
            }
        }
        $data['success'] = $succes;
        $data['error'] =$error;
        echo json_encode($data);
    }
public function uploadImageViaAjax(Request $request)
{
    $name = [];
    $original_name = [];
    $fileType = [];
    foreach ($request->file('file') as $key => $value) {
        $image = uniqid() . time() . '.' . $value->getClientOriginalExtension();
       // $destinationPath = public_path().'/images/';
        $destinationPath = public_path().'/documents';
        $value->move($destinationPath, $image);
        $name[] = $image;
        $original_name[] = $value->getClientOriginalName();
      //  $fileType[] = $value->getClientOriginalExtension();
    }

    return response()->json([
        'name'          => $name,
        'original_name' => $original_name,
        //'fileType' => $fileType
    ]);
}

//add form data to database
public function store(Request $request)
{
    
    $messages = array(
        'files.required' => 'Image is Required.'
    );
    $this->validate($request, array(
        'files' => 'required|array|min:1',
    ),$messages);
  
$i = 0;
 $user_id = Session::get('user_id');
    foreach ($request['files'] as $file) {
       
       
        $document_info = new DocumentInfo();
        $document_info->document_name = $file;
        $document_info->orginal_document_name = $request['original_name'][$i];
        $document_info->extension_type = '.docs';
        $document_info->user_id = $user_id;
        $document_info->save();
        
        $insert_id = $document_info->id;//document_id

        $document_queue = new DocumentQueue();
        $document_queue->document_id = $insert_id;
        $document_queue->document_name = $file;
        //$document_queue->extension_type = '.'.$fileType;
        $document_queue->status = 1;
        $document_queue->save();
         //print_r($document_queue);
       
       $i++;
 
    }
    
    $notification=array(
    'message'=>'Document Successfully Added!',
    'done'=>'success',
    );
    return redirect()
    ->route('Pdf.document-list.documentList')
    ->with($notification);
}

}
