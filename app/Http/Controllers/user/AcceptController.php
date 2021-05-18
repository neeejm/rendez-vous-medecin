<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\RendezVous;
use Auth;
use Illuminate\Support\Facades\DB;

class AcceptController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'doctor',]);
    }

    public function accept($id)
    {
        $doc_id = Doctor::where('user_id', Auth::user()->user_id)->first()->doc_id;
        // dd($this->approval);
        // dd($id);
        DB::beginTransaction();

        try
        {
           RendezVous::where('rv_id', $id)
                        ->where('doc_id', $doc_id)
                        ->update(['state' => config('global.approved'),]); 
        }
        catch(Throwable $e)
        {
            DB::rollback();
        }
        DB::commit();
        return $this->index();
    }

    public function reject($id)
    {
        $doc_id = Doctor::where('user_id', Auth::user()->user_id)->first()->doc_id;
        // dd($this->approval);
        DB::beginTransaction();

        try
        {
           RendezVous::where('rv_id', $id)
                        ->where('doc_id', $doc_id)
                        ->update(['state' => config('global.denied'),]); 
            // User::destroy(Doctor::where('doc_id', $id)->first()->user_id);
            // Address::where('doc_id', $id)->delete();
            // SpecialiseIn::where('doc_id', $id)->delete();
            // Doctor::destroy($id);
        }
        catch(Throwable $e)
        {
            DB::rollback();
        }
        DB::commit();
        return $this->index();
    }

    //
    public function index()
    {
        $doc_id = Doctor::where('user_id', Auth::user()->user_id)->first()->doc_id;

        return view('/user/accept', [
            'rvs' => RendezVous::all()->where('doc_id', $doc_id),
        ]);
    }
}
