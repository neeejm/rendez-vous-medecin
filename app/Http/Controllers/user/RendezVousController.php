<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Client;
use App\Models\Calendar;
use App\Models\Tarif;
use App\Models\RendezVous;
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
                'state' =>  config('global.on_hold'), 
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
        $data = Doctor::where('doc_id', $id)->first();
        $doc_name = $data->fname . ' ' . $data->lname;
        // dd($doc_name);

        $data = Client::where('user_id', Auth::user()->user_id)->first();
        $client_name = $data->fname . ' ' . $data->lname;
        // dd($client_name);

        return view('user/rendezvous', [
            'id' => $id,
            'doc_name' => $doc_name,
            'client_name' => $client_name,
            'cals' => Calendar::where('doc_id', $id)->get(),
            'tars' => Tarif::where('doc_id', $id)->get(),
        ]);
    }
}
