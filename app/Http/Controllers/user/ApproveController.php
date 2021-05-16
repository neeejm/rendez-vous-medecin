<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Address;
use App\Models\SpecialiseIn;
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
        return view('/user/approve', [
            'docs' => Doctor::all(),
        ]);
    }
}
