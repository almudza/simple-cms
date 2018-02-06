<?php

namespace Devmus\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Devmus\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
    	return view('admin.pages.dashboard');
    }
}
