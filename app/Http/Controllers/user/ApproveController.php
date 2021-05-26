<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Address;
use App\Models\SpecialiseIn;
use App\Models\Specialtie;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class ApproveController extends Controller
{
    private $approval = 'Nada';
    //
    public function __construct()
    {
        $this->middleware(['auth', 'admin',]);
    }

    // accept doctor apply or deny it
    // public function approveOrDeny(Request $request)
    // {
    //     $this->approval = $request->input('approval');
    //     // Doctor::where()
    //     return $this->index();
    // }

    public function approve($id)
    {
        // dd($this->approval);
        // dd($id);
        DB::beginTransaction();

        try
        {
           Doctor::where('doc_id', $id)->update(['is_valid' => true,]); 
        }
        catch(Throwable $e)
        {
            DB::rollback();
        }
        DB::commit();
        return $this->index();
    }

    public function deny($id)
    {
        // dd($this->approval);
        DB::beginTransaction();

        try
        {
            User::destroy(Doctor::where('doc_id', $id)->first()->user_id);
            Address::where('doc_id', $id)->delete();
            SpecialiseIn::where('doc_id', $id)->delete();
            Doctor::destroy($id);
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
        $sps =[];

        // dd(SpecialiseIn::where('doc_id', 62)->get());
        foreach (SpecialiseIn::all() as $sp)
        {
            foreach (Specialtie::where('sp_id', $sp->sp_id)->get('name') as $spv)
            {
                $sps[] = $sp->doc_id . ',' . $spv->name;
            }
        } 

        // dd($sps);

        return view('/user/approve', [
            'docs' => Doctor::all(),
            'cs' => City::all(),
            'adr' => Address::all(),
            'sps' => $sps,
        ]);
    }
}
