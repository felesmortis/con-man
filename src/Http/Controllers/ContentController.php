<?php

namespace Seat\ConMan\Http\Controllers;

use App\Ts3;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/**
	* ContentController short summary.
	*
	* ContentController description.
	*
	* @version 1.0
	* @author music
	*/
class ContentController extends Controller
{
    public function getControls()
    {
        //return view('controls');
        return 'Hello World';
    }

    public function getSettings()
    {
        return view('conman::contentsettings');
    }

}