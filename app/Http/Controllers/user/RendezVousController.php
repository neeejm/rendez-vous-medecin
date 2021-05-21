<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Client;
use App\Models\Calendar;
use App\Models\Tarif;
use App\Models\RendezVous;
use App\Models\Address;
use App\Models\City;
use App\Models\SpecialiseIn;
use App\Models\Specialtie;
use Auth;
use Illuminate\Support\Facades\DB;

class RendezVousController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'client',]);
    }

    public function take(Request $request, $id)
    {
    //    dd($request->tar);
        DB::beginTransaction();

        try
        {
            RendezVous::create([
                'doc_id' => $id,
                'tar_id' => $request->tar,
                'client_id' => Client::where('user_id', Auth::user()->user_id)->first()->client_id,
                'dt_id' => $request->cal,
                'reasons' => $request->reason,
                'state' => config('global.on_hold'), 
            ]);
        }
        catch(Throwable $e)
        {
            DB::rollback();
        }
        DB::commit();

        $this->status = "rv taken"; 
        return redirect()->route('profile', [
           'status' => $this->status, 
        ]);
    }

    public function index($id)
    {
        $doc = Doctor::where('doc_id', $id)->first();
        $city = City::where('ci_id', Address::where('doc_id', $id)->first()->ci_id)->first()->city;
        // dd($city);
        $sps =[];

        // dd(SpecialiseIn::where('doc_id', 62)->get());
        foreach (SpecialiseIn::where('doc_id', $doc->doc_id)->get() as $sp)
        {
            foreach (Specialtie::where('sp_id', $sp->sp_id)->get() as $spv)
            {
                $sps[] = $spv;
            }
        } 
        // dd($sps);
        return view('user/rendezvous', [
            'id' => $id,
            'doc' => $doc,
            'city' => $city,
            'client' => Client::where('user_id', Auth::user()->user_id)->first(),
            'cals' => Calendar::where('doc_id', $id)->get(),
            'tars' => Tarif::where('doc_id', $id)->get(),
            'sps'=> $sps,
            'adr'=> Address::where('doc_id', $id)->first(),
        ]);
    }
}
