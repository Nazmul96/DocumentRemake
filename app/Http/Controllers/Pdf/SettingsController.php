<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Image;
use App\Models\GlovalSetting;

class SettingsController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function glovalSetting()
    {
       return view('/admin/pdf-setting/gloval-setting');
    }

    public function saveGlovalSetting(Request $request)
    {
        // $validatedData = $request->validate([
        //     'brand_name' => 'required',
        //     'status' => 'required',
        // ]);

        // echo "<pre>";print_r($request->word_name);die();
        $error = array();
        $succes = 0;
        if(count($request->word_name)>0){

            foreach($request->word_name as $key=>$word_name){
                $error_chk = GlovalSetting::where('name',$request->word_name[$key])->get()->toArray();
                // echo "<pre>";print_r($error_chk);die();
                if(empty($error_chk)){
                    if(!empty($word_name) && !empty($request->word_value[$key]) && !empty($request->type[$key])){
                        $glovalSetting = new GlovalSetting();  
                        $glovalSetting->name = $word_name;
                        $glovalSetting->value = $request->word_value[$key];
                        $glovalSetting->type = $request->type[$key];
                        $glovalSetting->save();
                        $succes = $succes+1;
                    }
                }else{
                    $error[]=$key+1;
                }
            }

        }
        $data['success'] = $succes;
        $data['error'] =$error;
        echo json_encode($data);

        // return redirect()->route('Pdf.gloval-setting-list.glovalSettingList')->with('message', 'Words value Stored successfully.');

    }

    public function glovalSettingList()
    {
        $Words_details = GlovalSetting::get()->toArray();
        // echo "<pre>";print_r($Words_details);die();
        return view('/admin/pdf-setting/gloval-setting-list')->with('words_details', $Words_details);
    }

    public function updateGlovalSetting(Request $request)
    {

        $error = array();
        $success = 0;
        if(count($request->ids)>0){

            foreach($request->ids as $key=>$id){

                $error_chk = GlovalSetting::where('name',$request->word_name[$key])->first()->toArray();
                if(!empty($error_chk)){
                    if($error_chk['id'] == $id){
                        $glovalSetting = GlovalSetting::find($id);
                        $glovalSetting->name = $request->word_name[$key];
                        $glovalSetting->value = $request->word_value[$key];
                        $glovalSetting->type = $request->type[$key];
                        $glovalSetting->update();

                        $success = $success+1;
                    }else{
                        $error[] = $id;
                    }
                }
            }
        }

        $data['success'] = $success;
        $data['error'] =$error;
        echo json_encode($data);

    }

}
