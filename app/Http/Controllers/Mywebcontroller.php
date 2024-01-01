<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mywebcontroller extends Controller
{
	/*public function __construct()
    {
        $this->middleware('auth');
    }*/
   public function read()
{
    
    return "data from myweb";
} 
public function readjson()
{
    
   return response()->json(['foo'=>'bar']);
}

}
