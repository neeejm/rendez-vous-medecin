<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        return view('/user/profile');
    }
}
