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

    public function cancel($id)
    {
        // dd('canel');
        DB::beginTransaction();

        try
        {
            Calendar::where('dt_id', $id)->delete();
        }
        catch(Throwable $e)
        {
            DB::rollback();
        }
        DB::commit();
        $this->status = 'supprimé';

        return redirect()->route('profile.calendar', [
            'status' => $this->status,
        ]);
    }

    public function index()
    {
        $this->doc_id = Doctor::where('user_id', Auth::user()->user_id)->first()->doc_id;
        $cals = Calendar::all()->where('doc_id', $this->doc_id);

        $calendars = [];
        foreach ($cals as $cal)
        {
            $date = explode(' ', $cal->date_time)[0];
            $time = [];
            foreach ($cals as $cal2)
            {
                if ($date == explode(' ', $cal2->date_time)[0]) 
                    $time[$cal2->dt_id] = explode(' ', $cal2->date_time)[1];
            }
            $calendars[$date] = $time;
        }
        // dd($calendars);

        return view('user/calendar', [
            'cals' => $calendars,
        ]);
    }
}
