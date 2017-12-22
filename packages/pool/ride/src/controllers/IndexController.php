<?php namespace Pool\Ride\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	echo '<pre>';print_r($request->all());exit;
        echo 'hii';
    }
    
}
