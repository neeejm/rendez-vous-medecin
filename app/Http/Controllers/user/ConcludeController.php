<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Client;
use App\Models\RendezVous;
use App\Models\Calendar;
use App\Models\Tarif;
use App\Models\DetailImage;
use App\Models\DetailFile;
use Auth;
use Illuminate\Support\Facades\DB;

class ConcludeController extends Controller
{
    private $week;
    //
    public function __construct()
    {
        $this->middleware(['auth', 'doctor',]);
        $this->week = date('W');
    }

    public function redirectTo($id)
    {
        $doc_id = Doctor::where('user_id', Auth::user()->user_id)->first()->doc_id;
        $rv = RendezVous::all()->where('rv_id', $id)->first();
        $data = Doctor::where('doc_id', $doc_id)->first();
        $doc_name = $data->fname . ' ' . $data->lname;

        $data = Client::where('client_id', $rv->client_id)->first();
        $client_name = $data->fname . ' ' . $data->lname;

        // dump($id);
        return view('/user/conclude', [
            'id' => $id,
            'doc_name' => $doc_name,
            'client_name' => $client_name,
            'cal' => Calendar::where('dt_id', $rv->dt_id)->first(),
            'tar' => Tarif::where('tar_id', $rv->tar_id)->first(),
            'reason' => $rv->reasons,
        ]);
    }

    public function conclude(Request $request, $id)
    {
        // dd(RendezVous::where('rv_id', $id)->first()->state);
        $this->status = null;
        if(RendezVous::where('rv_id', $id)->first()->state != config('global.done'))
        {
                    // $doc_id = Doctor::where('user_id', Auth::user()->user_id)->first()->doc_id;
            // // dd($this->approval);
            // // dd($id);
            DB::beginTransaction();

            // $request->file('img')->store('images');
            // dd(substr($request->file('img')->store('public/images/detail'), strlen('public/')));
            try
            {
                RendezVous::where('rv_id', $id)
                                ->update([
                                    'state' => config('global.done'),
                                    'doc_detail' => $request->detail,                     
                                ]); 

                if(!is_null($request->img))
                foreach ($request->file('img') as $index => $item)
                {
                    // if(!is_null($img))
                    // {
                        DetailImage::create([
                            'rv_id' => $id,
                            'img' => substr($request->img[$index]->store('public/images/detail'), strlen('public/')),
                        ]);
                    // }
                }

                if(!is_null($request->file))
                foreach($request->file('file') as $index => $item)
                {
                    // if(!is_null($file))
                    // {
                        DetailFile::create([
                            'rv_id' => $id,
                            'file' => substr($request->file[$index]->store('public/files/detail'), strlen('public/')),
                        ]);
                    // }
                }

                Calendar::where('dt_id', RendezVous::where('rv_id', $id)->first()->dt_id)->update([
                    'is_free' => true,
                ]);
            }
            catch(Throwable $e)
            {
                DB::rollback();
            }
            DB::commit();
            $this->status = 'concluded';
        }

        return redirect()->route('profile.rv', [
            'status' => $this->status,
        ]);
    }

    public function next($week)
    {
        $this->week = $week;
        $this->week += 4;

        return $this->index();
        // return view("test");
    }

    public function previous($week)
    {
        $this->week = $week;
        $this->week -= 4;

        return $this->index();
    }
    //
    public function index()
    {
        $doc_id = Doctor::where('user_id', Auth::user()->user_id)->first()->doc_id;

        $rvs = RendezVous::all()->where('doc_id', $doc_id);
        $cals = Calendar::all()->where('doc_id', $doc_id);

        $calendar = [];
        foreach ($rvs as $rv)
        {
            foreach ($cals as $cal)
            {
                if ($rv->dt_id == $cal->dt_id)
                {
                    $calendar[$rv->rv_id] = explode(' ', $cal->date_time)[0] . ',' . substr(explode(' ', $cal->date_time)[1], 0, -3) . ',' . $rv->state;
                }
            }
        }
        // foreach ($cals as $cal)
        // {
        //     $info = [];
        //     $is_in = false;
        //     foreach ($rvs as $rv)
        //     {
        //         if ($rv->dt_id == $cal->dt_id)
        //         {
        //             $info[$rv->rv_id] = substr(explode(' ', $cal->date_time)[1], 0, -3) . ',' . $rv->state;
        //             $is_in = true;
        //         }
        //     }
        //     if ($is_in)
        //         $calendar[explode(' ', $cal->date_time)[0]] = $info;
        // } 
        // dump("end");
        // dd($calendar);

        return view('/user/rvs', [
            'rvs' => $calendar,
            'week' => $this->week,
        ]);
    }
}
