<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Autho Routes
require __DIR__.'/auth.php';

// Language Switch
Route::get('language/{language}', 'LanguageController@switch')->name('language.switch');

/*
*
* Frontend Routes
*
* --------------------------------------------------------------------
*/
Route::get('/', [BackendController::class,'login']);


Route::get('writetexts', 'WriteController@writetext');
Route::group(['namespace' => 'Frontend', 'as' => 'frontend.'], function () {
   
    Route::get('home', 'FrontendController@index')->name('home');
    Route::get('privacy', 'FrontendController@privacy')->name('privacy');
    Route::get('terms', 'FrontendController@terms')->name('terms');

    Route::group(['middleware' => ['auth']], function () {
        /*
        *
        *  Users Routes
        *
        * ---------------------------------------------------------------------
        */
        $module_name = 'users';
        $controller_name = 'UserController';
        Route::get('profile/{id}', ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
        Route::get('profile/{id}/edit', ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
        Route::patch('profile/{id}/edit', ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
        Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
        Route::get('profile/changePassword/{username}', ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
        Route::patch('profile/changePassword/{username}', ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
        Route::delete('users/userProviderDestroy', ['as' => 'users.userProviderDestroy', 'uses' => 'UserController@userProviderDestroy']);
    
        
        
    });

});

/*
*
* Backend Routes
* These routes need view-backend permission
* --------------------------------------------------------------------
*/

Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'as' => 'backend.', 'middleware' => ['auth', 'can:view_backend']], function () {


    //Profile settings-------------------
    Route::get('my/account', 'BackendController@myAccount')->name('my_account');
    Route::post('my/account/update', 'BackendController@myaccountUpdate')->name('myaccountUpdate');
    /**
     * Backend Dashboard
     * Namespaces indicate folder structure.
     */
   
    //Route::get('/', 'BackendController@index')->name('home');
    Route::get('dashboard', 'BackendController@index')->name('dashboard');
    Route::get('addsections', 'BackendController@addSections')->name('addsections');
    Route::post('savesections', 'BackendController@SaveSections')->name('savesections');
    Route::get('editsections/{id}', 'BackendController@editSections')->name('editsections');
    Route::post('updatesections/{id}', 'BackendController@updateSections')->name('updatesections');
    Route::get('deletesections/{id}', 'BackendController@deleteSections')->name('deletesections');
    Route::get('allsections', 'BackendController@allSections')->name('allsections');

    //Case Section----------------
    Route::get('sectionwisecase/{id}', 'CaseSectionController@sectionWiseCase')->name('sectionwisecase');
    Route::get('case/info/{id}', 'CaseSectionController@caseInfo')->name('case-info');
    Route::get('case/value/{id}', 'CaseSectionController@caseValue')->name('enter-case-value');
    Route::post('case/value/save', 'CaseSectionController@caseValueSave')->name('case-value-save');

    //Section Template-------------
    Route::get('section/template/{id}', 'TemplateController@templateList')->name('all-template');
    Route::get('section/template/upload/{id}', 'TemplateController@uploadTemplate')->name('upload-template');
    Route::post('section/template/uploads/', 'TemplateController@uploadsTemplate')->name('template-uploads');
    Route::get('templete-delete/{id}', ['as' => "templete-delete.templeteDelete", 'uses' => "TemplateController@templeteDelete"]);
    Route::get('section/template/preview/{id}', 'TemplateController@templatePreview')->name('templete-preview');

     //Section Variable-------------
     Route::get('section/variable/add/{id}', 'CaseSectionController@addVariable')->name('add-variable');
     Route::post('section/variable/save', 'CaseSectionController@saveVariable')->name('save-template-variable');
     Route::get('section/variable/delete/{id}', 'CaseSectionController@deleteVariable')->name('variable-delete');


    //Get Current Docs----------------
    Route::get('get/current/docs', 'CaseSectionController@getCurrentDocs')->name('getCurrentDocs');

    //Create Docs---------------------
    Route::get('create/docs', 'CaseSectionController@createDocs')->name('create-doc');

    //Document Queue------------------
    Route::get('document/queue', 'CaseSectionController@documentQueue')->name('document-queue');
    Route::get('document/process/queue', 'CaseSectionController@documentProcessQueue')->name('document-process-queue');

    //Download created doc------------
    Route::get('document/download', 'CaseSectionController@documentDownload')->name('document-download');

    /*
     *
     *  Settings Routes
     *
     * ---------------------------------------------------------------------
     */
    Route::group(['middleware' => ['permission:edit_settings']], function () {
        $module_name = 'settings';
        $controller_name = 'SettingController';
        Route::get("$module_name", "$controller_name@index")->name("$module_name");
        Route::post("$module_name", "$controller_name@store")->name("$module_name.store");
    });

    /*
    *
    *  Notification Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'notifications';
    $controller_name = 'NotificationsController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/markAllAsRead", ['as' => "$module_name.markAllAsRead", 'uses' => "$controller_name@markAllAsRead"]);
    Route::delete("$module_name/deleteAll", ['as' => "$module_name.deleteAll", 'uses' => "$controller_name@deleteAll"]);
    Route::get("$module_name/{id}", ['as' => "$module_name.show", 'uses' => "$controller_name@show"]);

    /*
    *
    *  Backup Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'backups';
    $controller_name = 'BackupController';
    Route::get("$module_name", ['as' => "$module_name.index", 'uses' => "$controller_name@index"]);
    Route::get("$module_name/create", ['as' => "$module_name.create", 'uses' => "$controller_name@create"]);
    Route::get("$module_name/download/{file_name}", ['as' => "$module_name.download", 'uses' => "$controller_name@download"]);
    Route::get("$module_name/delete/{file_name}", ['as' => "$module_name.delete", 'uses' => "$controller_name@delete"]);

    /*
    *
    *  Roles Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'roles';
    $controller_name = 'RolesController';
    Route::resource("$module_name", "$controller_name");

    /*
    *
    *  Users Routes
    *
    * ---------------------------------------------------------------------
    */
    $module_name = 'users';
    $controller_name = 'UserController';
    Route::get("$module_name/profile/{id}", ['as' => "$module_name.profile", 'uses' => "$controller_name@profile"]);
    Route::get("$module_name/profile/{id}/edit", ['as' => "$module_name.profileEdit", 'uses' => "$controller_name@profileEdit"]);
    Route::patch("$module_name/profile/{id}/edit", ['as' => "$module_name.profileUpdate", 'uses' => "$controller_name@profileUpdate"]);
    Route::get("$module_name/emailConfirmationResend/{id}", ['as' => "$module_name.emailConfirmationResend", 'uses' => "$controller_name@emailConfirmationResend"]);
    Route::delete("$module_name/userProviderDestroy", ['as' => "$module_name.userProviderDestroy", 'uses' => "$controller_name@userProviderDestroy"]);
    Route::get("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePassword", 'uses' => "$controller_name@changeProfilePassword"]);
    Route::patch("$module_name/profile/changeProfilePassword/{id}", ['as' => "$module_name.changeProfilePasswordUpdate", 'uses' => "$controller_name@changeProfilePasswordUpdate"]);
    Route::get("$module_name/changePassword/{id}", ['as' => "$module_name.changePassword", 'uses' => "$controller_name@changePassword"]);
    Route::patch("$module_name/changePassword/{id}", ['as' => "$module_name.changePasswordUpdate", 'uses' => "$controller_name@changePasswordUpdate"]);
    Route::get("$module_name/trashed", ['as' => "$module_name.trashed", 'uses' => "$controller_name@trashed"]);
    Route::patch("$module_name/trashed/{id}", ['as' => "$module_name.restore", 'uses' => "$controller_name@restore"]);
    Route::get("$module_name/index_data", ['as' => "$module_name.index_data", 'uses' => "$controller_name@index_data"]);
    Route::get("$module_name/index_list", ['as' => "$module_name.index_list", 'uses' => "$controller_name@index_list"]);
    Route::resource("$module_name", "$controller_name");
    Route::patch("$module_name/{id}/block", ['as' => "$module_name.block", 'uses' => "$controller_name@block", 'middleware' => ['permission:block_users']]);
    Route::patch("$module_name/{id}/unblock", ['as' => "$module_name.unblock", 'uses' => "$controller_name@unblock", 'middleware' => ['permission:block_users']]);


    
    // ==================== RS SOFTWARE start here =======================

    Route::get('add-list', ['as' => "add-list.addList", 'uses' => "AddsController@addList"]);
    Route::get('categorie-list', ['as' => "categorie-list.categorieList", 'uses' => "AddsController@categorieList"]);
    Route::get('add-categorie', ['as' => "add-categorie.addCategorie", 'uses' => "AddsController@addCategorie"]);
    Route::get('brand-list', ['as' => "brand-list.brandList", 'uses' => "AddsController@brandList"]);
    Route::get('add-brand', ['as' => "add-brand.addBrand", 'uses' => "AddsController@addBrand"]);
    Route::post('save-brand', ['as' => "save-brand.saveBrand", 'uses' => "AddsController@saveBrand"]);
    Route::get('brand-edit/{id}', ['as' => "brand-edit.brandEdit", 'uses' => "AddsController@brandEdit"]);
    Route::post('brand-update/{id}', ['as' => "update-brand.updateBrand", 'uses' => "AddsController@updateBrand"]);
    
    

});

Route::group(['namespace' => 'Pdf', 'prefix' => 'admin', 'as' => 'Pdf.', 'middleware' => ['auth', 'can:view_backend']], function () {

    // Settings-------------
    Route::get('gloval-setting', ['as' => "gloval-setting.glovalSetting", 'uses' => "SettingsController@glovalSetting"]);
    Route::post('gloval-setting-save', ['as' => "gloval-setting-save.saveGlovalSetting", 'uses' => "SettingsController@saveGlovalSetting"]);
    Route::get('gloval-setting-list', ['as' => "gloval-setting-list.glovalSettingList", 'uses' => "SettingsController@glovalSettingList"]);
    Route::post('gloval-setting-update', ['as' => "gloval-setting-update.updateGlovalSetting", 'uses' => "SettingsController@updateGlovalSetting"]);

    Route::post('upload-image-via-ajax', ['as' => "uploadImageViaAjax", 'uses' => "DocumentController@uploadImageViaAjax"]);
    Route::post('store-image', ['as' => "image.store", 'uses' => "DocumentController@store"]);
    
  //  Route::post('upload-image-via-ajax', 'DocumentController@uploadImageViaAjax')->name('uploadImageViaAjax');
  //  Route::post('store-image', 'DocumentController@store')->name('image.store');
    // Documents
    Route::get('add-documents', ['as' => "add-documents.addDocument", 'uses' => "DocumentController@addDocument"]);
    Route::post('save-document-upload', ['as' => "save-document-upload.saveDocumentUpload", 'uses' => "DocumentController@saveDocumentUpload"]);
    Route::get('document-list', ['as' => "document-list.documentList", 'uses' => "DocumentController@documentList"]);
    Route::get('document-delete/{id}', ['as' => "document-delete.documentDelete", 'uses' => "DocumentController@documentDelete"]);
    Route::get('add-words/{id}', ['as' => "add-words.addWords", 'uses' => "DocumentController@addWords"]);
    Route::post('document-word-save', ['as' => "document-word-save.documentWordSave", 'uses' => "DocumentController@documentWordSave"]);
    
});

Route::group(['namespace' => 'Backend','prefix' => 'admin', 'as' => 'case.', 'middleware' => ['auth', 'can:view_backend']], function () {

    Route::get('case/add/{id?}', ['as' => "add-case", 'uses' => "CaseController@addCase"]);
    Route::post('case/save', ['as' => "save-case", 'uses' => "CaseController@saveCase"]); 
    Route::get('case/list', ['as' => "all-case", 'uses' => "CaseController@caseList"]); 
    Route::get('section/list', ['as' => "section_search", 'uses' => "CaseController@section_search"]);
    Route::get('case/edit/{id}', ['as' => "edit-case", 'uses' => "CaseController@caseEdit"]);
    Route::post('case/update/{id}', ['as' => "case-update", 'uses' => "CaseController@caseUpdate"]);  
    Route::get('case/delete/{id}', ['as' => "case-delete", 'uses' => "CaseController@caseDelete"]); 

});

Route::group(['namespace' => 'Backend','prefix' => 'user','middleware' => ['auth', 'can:view_backend']], function () {
    Route::get('/', 'UserManageController@index')->name('users');
    Route::get('/add', 'UserManageController@addUser')->name('add.user');
    Route::post('/save', 'UserManageController@userSave')->name('user.save');
    Route::get('/edit/{id}', 'UserManageController@userEdit')->name('user.edit');
    Route::post('/update/{id}', 'UserManageController@userUpdate')->name('user.update');
    Route::get('/delete/{id}', 'UserManageController@userDelete')->name('user.delete');
});