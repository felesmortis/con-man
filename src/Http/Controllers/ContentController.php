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
    public function getHome()
    {
        //return view('controls');
        return view('conman::home');
    }

    public function getSettings()
    {
        return view('conman::settings');
    }

    public function getCreation()
    {
        return view('conman::creation');
    }

    public function getContent()
    {
        return view('conman::display');
    }

}