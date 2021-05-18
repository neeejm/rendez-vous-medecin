<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Calendar;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Auth;

class CalendarController extends Controller
{
    private $doc_id;     //

    public function __construct()
    {
        $this->middleware(['auth', 'doctor',]);
    }

    public function add(Request $request)
    {
        $cals = Calendar::all();
        $this->doc_id = Doctor::where('user_id', Auth::user()->user_id)->first()->doc_id;
        $dt = $request->input('date') . ' ' . $request->input('time') . ':00';
        // dump($dt);
        // dd($doc_id);

        $exist = false;
        foreach($cals as $cal)
            $exist = ($cal->date_time == $dt) ? true : false;
        // dd($exist);
                    
        if (!$exist)
        {
            DB::beginTransaction();

            try
            {
                Calendar::create([
                    'doc_id' => $this->doc_id,
                    'date_time' => $dt,
                ]);
            }
            catch(Throwable $e)
            {
                DB::rollback();
            }
            DB::commit();
            $this->status = 'yis';
        }
        else
            $this->status = 'bitch';

        return redirect()->route('profile.calendar', [
            'status' => $this->status,
        ]);
    }

    public function edit(Request $request, $id, $date, $time, $st)
    {
        $cals = Calendar::all();
        $dt = $date . ' ' . $time;

        $exist = false;
        foreach($cals as $cal)
            $exist = ($cal->date_time == $dt) ? true : false;
        // dd($exist);
                    
        if (!$exist)
        {
            DB::beginTransaction();

            try
            {
                Calendar::where('doc_id', $id)->udpate([
                    'date_time' => $dt,
                    'is_free' => $st,
                ]);
            }
            catch(Throwable $e)
            {
                DB::rollback();
            }
            DB::commit();
            $this->status = 'yis';
        }
        else
            $this->status = 'bitch';

        return redirect()->route('profile.calendar', [
            'status' => $this->status,
        ]);
    }

    public function index()
    {
        $this->doc_id = Doctor::where('user_id', Auth::user()->user_id)->first()->doc_id;

        return view('user/calendar', [
            'cals' => Calendar::all()->where('doc_id', $this->doc_id),
        ]);
    }
}
