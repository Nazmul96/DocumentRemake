<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Events\Backend\UserCreated;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use DB;

class UserManageController extends Controller
{
    public function __construct()
    {
        $this->module_name = 'users';
       
        
    }

    public function index()
    {
        if((Session::get('user_role') != 1) && (Session::get('user_role') != 2)){
                abort(404);
        }
        $users=User::whereIn('user_role',[2,3])->get();
        //dd($users);
        return view('admin.users.user',compact('users'));
    }

    public function addUser()
    {
        return view('admin.users.adduser');
    }

    public function userValidate($request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email'=>'required|unique:users,email',
            'user_role' =>'required',
            'password' => 'required|min:6',
        ]);
    }
    public function userSave(Request $request)
    {
        $this->userValidate($request);
      

        $module_name = $this->module_name;
        $module_name_singular = Str::singular($module_name);

        $user = $request->except('_token', 'roles', 'permissions', 'password_confirmation');

        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->name = $request->first_name.' '.$request->last_name;
        $user->email = $request->email;
        $user->user_role = $request->user_role;
        $user->password = Hash::make($request->password);
        $user->save();


        if ($request->confirmed == 1) {
            $roles = Role::select('name')->where('id', 8)->get()->toArray();
            $permissions = Permission::select('name')->whereIn('id', [1, 40])->get()->toArray();
        } else {
            $roles = Role::select('name')->where('id', 7)->get()->toArray();
            $permissions = Permission::select('name')->whereIn('id', [1, 39])->get()->toArray();
        }

        $permission = array();
        $role = array();
        foreach ($roles as $getrole) {
            $role[] = $getrole['name'];
        }

        foreach ($permissions as $getper) {
            $permission[] = $getper['name'];
        }

        $module_name_singular = Str::singular('user');

        if (isset($roles)) {
            $$module_name_singular->syncRoles($roles);
        } else {
            $roles = [];
            $$module_name_singular->syncRoles($roles);
        }

        // Sync Permissions
        if (isset($permissions)) {
            $$module_name_singular->syncPermissions($permissions);
        } else {
            $permissions = [];
            $$module_name_singular->syncPermissions($permissions);
        }

        // Username
        $id = $$module_name_singular->id;
        $username = config('app.initial_username') + $id;
        $$module_name_singular->username = $username;
        $$module_name_singular->save();

        event(new UserCreated($$module_name_singular));

        return redirect()->route('users')->with('success', 'Successfully User Created!');
    }

    public function userEdit($id)
    {
        $user_edit=User::find($id);
        return view('admin.users.edituser',compact('user_edit'));
    }

    protected function userupdateValidate($request){
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'user_role' =>'required',
        ]);
    }

    protected function userupdatenewValidate($request){
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'user_role' =>'required',
        ]);

    }
    
    public function userUpdate(Request $request,$id)
    {
        $password=$request->password;
        $re_password=$request->confirm_password;
        $user=User::find($id)->toArray();

        if($user['email'] == $request->email)
        {
            $this->userupdateValidate($request);
        }
        else
        {
            $this->userupdatenewValidate($request);
        }

        if(($password != '') || ($re_password != ''))
        {
            if($password == $re_password)
            {
                $user=User::find($id); 
                $user->first_name=$request->first_name;
                $user->last_name=$request->last_name;
                $user->user_role=$request->user_role;
                $user->name=$request->first_name.' '.$request->last_name;
                $user->email=$request->email;
                $user->password=Hash::make($request->password);
                $user->save();
    
                return redirect()->route('users')->with('success', 'Successfully Updated');
            }
            else
            {
               return redirect()->route('user.edit',$id)->with('do_not_match', 'Password did not match');
            }
        }
        else
        {
            $user=User::find($id); 
            $user->first_name=$request->first_name;
            $user->last_name=$request->last_name;
            $user->name=$request->first_name.' '.$request->last_name;
            $user->user_role=$request->user_role;
            $user->email=$request->email;
            $user->save();

            return redirect()->route('users')->with('success', 'Successfully Updated');
        }
    }

    public function userDelete($id)
    {
        $success=DB::table('users')->where('id', $id)->delete();

        if ($success) {
            $notification = array(
                'delete' => 'User Successfully deleted!',
            );
            return redirect()->back()->with($notification);
        }
    }
}
