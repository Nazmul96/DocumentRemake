<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;
use Arr;
use App\Authorizable;
use App\Models\GlovalSetting;
use App\Models\DocumentQueue;
use App\Models\DocumentInfo;
use App\Models\DocumentWord;
use App\Models\Template;
// use App\Events\Backend\UserCreated;
// use App\Events\Backend\UserProfileUpdated;
// use App\Events\Backend\UserUpdated;
// use App\Http\Controllers\Controller;
// use App\Models\Permission;
// use App\Models\Role;
// use App\Models\User;
// use App\Models\Userprofile;
// use App\Models\UserProvider;
// use App\Notifications\UserAccountCreated;
// use Carbon\Carbon;
// use Exception;
// use Illuminate\Http\Request;
// use Illuminate\Support\Arr;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Str;
// use Laracasts\Flash\Flash;
// use Yajra\DataTables\DataTables;

class WriteController extends Controller
{
    use Authorizable;

    public function __construct()
    {
        
    }
    
    public function index()
    {
        //echo 123;die();    
    }
    
    public function writetext()
    {
        $dirname = uniqid('', true);
        $zip = new \PhpOffice\PhpWord\Shared\ZipArchive();
        $getOne= DocumentQueue::where('status',0)->first();
        //dd($getOne);
        if($getOne != null){
            DocumentQueue::where('id',$getOne->id)->update(['status'=>0]);
            
            $document_id = $getOne->template_id;
            $documentInfo =  Template::where('id',$document_id)->first();
            $file = public_path('documents/'.$documentInfo->template_file);
          
            $docWord = DocumentWord::where('document_id',$document_id)->first();
            $docWords = [];
            if($docWord != null){
            $docWords = DocumentWord::select('name','value','type')->where('document_id',$document_id)->get()->toArray();
            $newArray = array();
            
            foreach($docWords as $key => $value) {
                $newvl = $value['value'];
                if($value['type'] == 1){
                $newvl =  strtoupper($newvl);
                }elseif($value['type'] == 2){
                $newvl =  ucfirst($newvl);
                }
                $newArray[$value['name']] = $newvl;
            }
              $docWords = $newArray;
           
            }
            $globalWords = GlovalSetting::select('name','value','type')->get()->toArray();
            $newArray = array();
            foreach($globalWords as $key => $value) {
                    $newvl = $value['value'];
                if($value['type'] == 1){
                    $newvl =  strtoupper($newvl);
                }elseif($value['type'] == 2){
                    $newvl =  ucfirst($newvl);
                }
                
            $newArray[$value['name']] = $newvl;
            }
            
            $allWords = array_unique(array_merge($newArray,$docWords));
            $phpword = new \PhpOffice\PhpWord\TemplateProcessor($file);  
            foreach($allWords as $key => $val) {
            $phpword->setValue($key,$val);
            }
            $new_document_name = time() . '_' .'s'.rand(10000, 999999) .$documentInfo->extension_type;
            
            $destinationPath = public_path().'/documents/'.$new_document_name;
            $phpword->saveAs($destinationPath);
            
            DocumentInfo::where('id',$document_id)->update(['update_file'=>$new_document_name]);
            DocumentQueue::where('id',$getOne->id)->delete();
        }

        
        
// if ($handle = opendir($dir)) {
//     echo "Directory handle: $handle\n";
//     echo "Entries:\n";

//     /* This is the correct way to loop over the directory. */
//     while (false !== ($entry = readdir($handle))) {
//         echo "$entry\n";
//     }

//     /* This is the WRONG way to loop over the directory. */
//     while ($entry = readdir($handle)) {
//         echo "$entry\n";
//     }

//     closedir($handle);
// }
        
            // $phpword = new \PhpOffice\PhpWord\TemplateProcessor($file);  
            // $phpword->setValue('«M_1PARISH»','Santosh');
            // $phpword->setValue('«M_2TESTATOR»','Achari');
            // $phpword->setValue('«M_3DAY»','Yahoo');
        
      // $phpword->saveAs('edited.docx');
        
        //   $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        // try {
        //     $objWriter->save(storage_path('helloWorld.docx'));
        // } catch (Exception $e) {
        // }
        // }else{
        //     echo 1221;die();
        // }    
        
        
     //$phpword = new \PhpOffice\PhpWord\TemplateProcessor($file);
   //  $bc = $phpWord->getSections();
     //echo 111;die();
   //  dd($bc);
    //}else{
    //    echo 12312;die();
   // }
     
     
    }
}