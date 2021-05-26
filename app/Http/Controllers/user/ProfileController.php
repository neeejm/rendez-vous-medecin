<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\RendezVous;
use App\Models\Doctor;
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
        $user = Auth::user();

        return view('/user/profile', [
            'client' => Client::where('user_id', $user->user_id)->first(),
            'doc' => Doctor::where('user_id', $user->user_id)->first(),
        ]);
    }
}
