<?php namespace Pool\Auth\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use Input;
use Redirect;
use Validator;
use URL;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Pool\Auth\Models\User as UserModel;
use Session;
use Helper;

class LoginController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {		
        $previousUrl = URL::previous();
        if (strpos($previousUrl, '/user/') !== false || strpos($previousUrl, '/logout') !== false) {
            Session::forget('previousUrl');
        } else {
            Session::put('previousUrl', $previousUrl);
        }
        return view('auth::login.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $input = $request->only('email', 'password');
        // validate the data
        $this->validate($request, array(
            'email' => 'required|exists:users,email',
            'password' => 'required'
            )
        );
        try {
            // find details by its creddentials
            $user = Sentinel::findByCredentials($input);            
            // authentication
            Sentinel::authenticate($input, $request->has('remember'));
        } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
            return Redirect::back()->withInput()->withErrors(array('User Not Activated.'));
        } catch (\Cartalyst\Sentinel\Checkpoints\ThrottlingException $e) {
            return Redirect::back()->withInput()->withErrors(array('Your account has been suspended due to 5 failed attempts. Try again after 15 minutes.'));
        }

        // Check for the login
        if (Sentinel::check() && Sentinel::inRole('administrator')) {            
            return $this->afterLoginProcess();
        } else {
            return Redirect::back()
                    ->withInput()
                    ->withErrors(array('Invalid credentials provided'));
        }
    }

    /**
     * Function to process the after login process
     * 
     * @param type $firstTime
     * @return type
     */
    public function afterLoginProcess()
    {
        //setting user details in session
        $userDetail = Sentinel::getUser()->toArray();
        Session::put('userDetail', $userDetail);
        if (Sentinel::inRole('administrator')) {         
            if (Session::has('previousUrl') && (URL::route('login-post') != Session::get('previousUrl')))
            {            
                $url = Session::get('previousUrl');
                Session::forget('previousUrl');
                return Redirect::to($url);
            }
            return Redirect::intended('dashboard');
        } else if(Sentinel::inRole('registered')){
            return Redirect::intended('dashboard');
        } else {
            Sentinel::logout();
            Session::flush();
            Session::regenerate();
            return Redirect::to('/admin-login')->with('message', 'Invalid credentials provided.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = UserModel::find($id);
        return view('auth::profile.profile', compact('users'));
    }

    /**
     * Function to logout user
     * @return type
     */
    public function logout(Request $request)
    {
        $route = "/admin-login";
        if (Sentinel::check() && Sentinel::inRole('registered')) { 
            $route = "/";
        }        
        Sentinel::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return Redirect::to($route);
    }
}
