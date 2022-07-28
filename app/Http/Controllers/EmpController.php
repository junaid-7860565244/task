<?php

namespace App\Http\Controllers;

use View;
use Illuminate\Http\Request;
use App\Models\Employee;
use  App\Http\Controllers\show;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\RegisterRequest;

use DB;

//hum yaha change kr rahe hai Git me change ho jayega dekho
class EmpController extends Controller

{
    public function index()

    {

        return view('Emp');
    }

public function insertdata(Request $request){


$validatedData = $request->validate([
    'name' => ['required'  ],
    'email' => ['required',  'max:30'],
    'number'=>['required', 'max:11'],
    'image' => ['required' ]
]);

    

    
        $Employee = new Employee();
       $Employee->name = $request->input('name');
       $Employee->email = $request->input('email');
        $Employee->number = $request->input('number');
       $Employee->password = $request->input('password');

          if($request->hasFile('image'))
            {    $file = $request->file('image');
                $picName = time().'.'.$file->getClientOriginalName();
                $imagePath = '/public/thumbnail';
                $request->file('image')->storeAs('public/images', $picName);
                $module_data->image = $picName;
                Image::make($file->getRealPath())->resize(100,100)->save(storage_path('app/public/images').$picName);
                $Employee->serial_no= $request->serial_no;
                
            }
        $Employee->save();
        return redirect('/employee/get')->with('status','Employee Image Added Successfully');
    }

     public function getdata()
    {
        $Employee = Employee::get();
          
         // dd( $Employee);
return View("show", compact('Employee')); 

       

    }

    public function editdata($id)
    {
$Employee =Employee::find($id);
return view('editform', ['Employee'=>$Employee , $id]);

    }

    
public function update(Request $request)

{

$update = Employee::where('id', $request->id) ->limit(1) ->update( [ 'name' =>$request->name,  'email' =>$request->email, 'number' => $request->number]);

return back();
}


       public function  deleteuser(Request $request){

            $module_data = Employee::find($request->id)->delete();
            return response()->json(['status'=> 'success' ,  'msg'=>'Delete Successfully!']); 
        }


    public function login() 
    {
        return view('login');
    }
public function show()
    {
        return view('login');
    }

 public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if(!Auth::validate($credentials)):
            return redirect()->to('login')
                ->withErrors(trans('auth.failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        if($request->get('remember')):
            $this->setRememberMeExpiration($user);
        endif;

        return $this->authenticated($request, $user);
    }

 protected function authenticated(Request $request, $user) 
    {
        return redirect()->intended();
    }

public function perform()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
     public function show()
    {
        return view('register');
    }
     public function register(RegisterRequest $request) 
    {
        $user = User::create($request->validated());

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }
    }





    
   





    
    








   





    
    







