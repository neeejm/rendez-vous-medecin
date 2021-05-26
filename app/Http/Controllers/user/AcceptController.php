<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RendezVous;
use App\Models\Doctor;
use App\Models\Client;
use App\Models\Calendar;
use App\Models\DetailFile;
use App\Models\DetailImage;
use App\Models\Tarif;
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
        // dd('accept');
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
        return $this->index($id);
    }

    public function reject($id)
    {
        // dd('reject');
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
            Calendar::where('dt_id', RendezVous::where('rv_id', $id)->first()->dt_id)->update([
                'is_free' => true,
            ]);
        }
        catch(Throwable $e)
        {
            DB::rollback();
        }
        DB::commit();
        return $this->index($id);
    }

    //
    public function index($id)
    {
        // dd($id);
        // $doc = Doctor::where('user_id', Auth::user()->user_id)->first();

        $rv = RendezVous::all()->where('rv_id', $id)->first();
        $doc = Doctor::where('user_id', Auth::user()->user_id)->first();

        foreach (Tarif::where('doc_id', $doc->doc_id)->get() as $tar)
        {
            if ($tar->tar_id == $rv->tar_id)
            {
                $price = $tar->price;
                break;
            }
        }

        foreach (Calendar::where('doc_id', $doc->doc_id)->get() as $cal)
        {
            if ($cal->dt_id == $rv->dt_id)
            {
                $date = explode(' ', $cal->date_time)[0];
                $time = explode(' ', $cal->date_time)[1];
                break;
            }
        }

        return view('user/accept', [
            'rv' => $rv,
            'doc' => $doc,
            'date' => $date,
            'time' => $time,
            'price' => $price,
            'files' => DetailFile::where('rv_id', $id)->get(),
            'imgs' => DetailImage::where('rv_id', $id)->get(),
        ]);
        // return view('/user/accept', [
        //     'rvs' => RendezVous::all()->where('doc_id', $doc_id),
        // ]);
    }
}
