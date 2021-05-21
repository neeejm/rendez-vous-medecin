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

class HistoryController extends Controller
{
    //
    public function history()
    {
        $client_id = Client::where('user_id', Auth::user()->user_id)->first()->client_id;
        $rvs = RendezVous::all()->where('client_id', $client_id);

        // $tmp =  Doctor::all('doc_id', 'fname', 'lname');
        $docs = [];

        foreach ($rvs as $rv)
        {
            $docs[$rv->doc_id] = Doctor::all('doc_id', 'fname', 'lname')->where('doc_id', $rv->doc_id)->first(); 
        }
        // dd($docs);

        return view('user/history', [
            'rvs' => $rvs,
            'docs' => $docs,
            'dts' => Calendar::all(),
            'tars' => Tarif::all(),
            'files' => DetailFile::all(),
            'imgs' => DetailImage::all(),
        ]);
    }
}
