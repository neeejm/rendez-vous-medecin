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
    private static $n = 0;
    //
    public function __construct()
    {
        $this->middleware(['auth', 'doctor',]);
    }

    public function redirectTo($id)
    {
        $doc_id = Doctor::where('user_id', Auth::user()->user_id)->first()->doc_id;
        $rv = RendezVous::all()->where('rv_id', $id)->first();
        $data = Doctor::where('doc_id', $doc_id)->first();
        $doc_name = $data->fname . ' ' . $data->lname;

        $data = Client::where('client_id', $rv->client_id)->first();
        $client_name = $data->fname . ' ' . $data->lname;

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
                {
                    self::$n++;
                    DetailImage::create([
                        'rv_id' => $id,
                        'img' => substr($request->file('img')->store('public/images/detail'), strlen('public/')),
                    ]);
                }

                if(!is_null($request->file))
                {
                    self::$n++;
                    DetailFile::create([
                        'rv_id' => $id,
                        'file' => substr($request->file('file')->store('public/files/detail'), strlen('public/')),
                    ]);
                }
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

    //
    public function index()
    {
        $doc_id = Doctor::where('user_id', Auth::user()->user_id)->first()->doc_id;

        return view('/user/rvs', [
            'rvs' => RendezVous::all()->where('doc_id', $doc_id),
        ]);
        // $data = Doctor::where('doc_id', $id)->first();
        // $doc_name = $data->fname . ' ' . $data->lname;
        // // dd($doc_name);

        // $data = Client::where('user_id', Auth::user()->user_id)->first();
        // $client_name = $data->fname . ' ' . $data->lname;
        // // dd($client_name);

        // return view('user/rendezvous', [
        //     'id' => $id,
        //     'doc_name' => $doc_name,
        //     'client_name' => $client_name,
        //     'cals' => Calendar::where('doc_id', $id)->get(),
        //     'tars' => Tarif::where('doc_id', $id)->get(),
        // ]);
    }
}
