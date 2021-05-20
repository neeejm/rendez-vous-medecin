<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\RendezVous;
use Auth;
use Illuminate\Support\Facades\DB;

class CancelController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'client',]);
    }

    public function cancel($id)
    {
        // dd($id);
        DB::beginTransaction();

        try
        {
            RendezVous::where('rv_id', $id)->update(['state' => config('global.canceled'),]); 
        }
        catch(Throwable $e)
        {
            DB::rollback();
        }
        DB::commit();
        $this->status = 'rendez-vous annuler';

        return redirect()->route('profile.crv', [
            'status' => $this->status,
        ]);
    }

    public function index()
    {
        $client_id = Client::where('user_id', Auth::user()->user_id)->first()->client_id;

        return view('/user/rvs', [
            'rvs' => RendezVous::all()->where('client_id', $client_id),
        ]);
    }
}
