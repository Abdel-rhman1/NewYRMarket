<?php

  

namespace App\Http\Controllers\Auth;

  
use Auth;
use App\Models\Vendor;
use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

  

class LoginController extends Controller

{

  

    use AuthenticatesUsers;

    

    protected $redirectTo = '/';

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function __construct()

    {

        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');


    }

  

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function login(Request $request)

    {   

        $input = $request->all();

        $this->validate($request, [

            'name' => 'required',

            'password' => 'required',

        ]);

  

        $fieldType = filter_var($request->name, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if(auth()->attempt(array($fieldType => $input['name'], 'password' => $input['password'])))

        {
            /*$vendor = Vendor::find(Auth::user()->v_id);
            $admins = User::where('v_id', $vendor->id)->get();
            $OldDate = strtotime($vendor->end_date);
            $NewDate = date('M j, Y', $OldDate);
            $diff = date_diff(date_create($NewDate),date_create(date("M j, Y")));
            if($diff->format('%a')== "0"){
                $vendor->package_id = 0;
                $vendor->save();
                foreach ($admins as $key => $value) {
                    # code...
                }
                return redirect('/')->with(['error' => 'Sorry! Your Package is Expired']);
            }
            else
                return redirect('/')->with(['error' => $diff->format('Your package will expire after %a days') ]);*/
             return redirect('/');

        }else{

            return redirect()->route('login')

                ->with('error','Email-Address And Password Are Wrong.');

        }

          

    }



    public function showAdminLoginForm()
    {
        return view('admin.auth.loginAdmin');
    }
    
    public function adminLogin(Request $request)

    {   

        $this->validate($request, [
            'name'   => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt(['name' => $request->name, 'password' => $request->password])) {

            return redirect('/admin');
        }
        else{
            return back()->withInput($request->only('name'));

        }

    }

}