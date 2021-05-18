<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarif;
use App\Models\Doctor;
use Auth;
use Illuminate\Support\Facades\DB;

class TarifController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'doctor',]);
    }

    public function add(Request $request)
    {
        $doc_id = Doctor::where('user_id', Auth::user()->user_id)->first()->doc_id;

        DB::beginTransaction();

        try
        {
            Tarif::create([
                'doc_id' => $doc_id,
                'title' => $request->title,
                'price' => $request->price,
            ]);
        }
        catch(Throwable $e)
        {
            DB::rollback();
        }
        DB::commit();
        $this->status = 'yis';

        return redirect()->route('profile.tarif', [
            'status' => $this->status,
        ]);
    }

    public function index()
    {
        $doc_id = Doctor::where('user_id', Auth::user()->user_id)->first()->doc_id;
        return view('user/tarif', [
            'tars' => Tarif::all()->where('doc_id', $doc_id),
        ]);
    }
}
