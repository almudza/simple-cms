<?php

namespace Devmus\Http\Controllers\User;

use Illuminate\Http\Request;
use Devmus\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
    	return view('user.pages.home');
    }
}
