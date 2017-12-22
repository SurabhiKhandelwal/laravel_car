<?php namespace Pool\Dashboard\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Controllers\Controller;
use Sentinel;
use Session;

class IndexController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = array();
        if (Sentinel::check()) {
            $user = Sentinel::getUser()->toArray();
            if (Sentinel::inRole('administrator')) {                
                $viewName = 'dashboard::index.adminIndex';
            } else if (Sentinel::inRole('registered')) {                
                $viewName = 'dashboard::index.userIndex';
            }
            return view($viewName , compact('user'));
        } else {
            return Redirect::to('/');
        } 
    }
    
}
