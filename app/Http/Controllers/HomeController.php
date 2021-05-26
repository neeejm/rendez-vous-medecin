<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialiseIn;
use App\Models\Specialtie;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Address;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search(Request $request)
    {
        $docs = [];
        // dd(Address::all());

        if ($request->city)
        {
            foreach (Address::all() as $adr)
            {
                if ($adr->ci_id == $request->city)
                    $docs[] = $adr->adr_id;
                    // dump($adr->adr_id);
            }
        }

        if ($request->sps)
        {
            foreach (SpecialiseIn::all() as $spin) 
            {
                foreach($request->sps as $sp)
                {
                    if ($spin->sp_id == $sp)
                        $docs[] = $spin->doc_id;
                        // dump($spin->doc_id);
                }
            }
        }

        if ($request->city && $request->sps)
        {
            $tmp = array_unique($docs);
            $docs = [];
            foreach($tmp as $k => $v) 
                $docs[] = $v; 
        }

        $tmp = $docs;
        $docs =[];
        foreach (Doctor::where('is_valid', true)->get() as $doc) 
        {
            foreach($tmp as $id)
            {
                // dump($doc->doc_id);
                if ($doc->doc_id == $id)
                    // dump($id);
                    $docs[] = $doc;
            }
        }

        $sps =[];

        // dd(SpecialiseIn::where('doc_id', 62)->get());
        foreach (SpecialiseIn::all() as $sp)
        {
            foreach (Specialtie::where('sp_id', $sp->sp_id)->get('name') as $spv)
            {
                $sps[] = $sp->doc_id . ',' . $spv->name;
            }
        } 

        // dd('nay');
        // dd($docs);

        return view('home', [
            'sps' => Specialtie::all(),
            'doc_sps' => $sps,
            'cs' => City::all(),
            'docs' => $docs,
            'adr' => Address::all(),
            'is_doctor' => Doctor::where('user_id', Auth::user()->user_id)->exists(),
        ]);
    }

    public function findAll(Request $request)
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

        return view('home', [
            'sps' => Specialtie::all(),
            'doc_sps' => $sps,
            'cs' => City::all(),
            'adr' => Address::all(),
            'docs' => Doctor::where('is_valid', true)->get(),
            'is_doctor' => Doctor::where('user_id', Auth::user()->user_id)->exists(),
        ]);
    }

    public function findName(Request $request)
    {
        $docs = [];

        if ($request->name)
        {
            foreach (Doctor::where('is_valid', true)->get() as $doc)
            {
                if (str_contains($doc->fname, $request->name) || str_contains($doc->lname, $request->name))
                    $docs[] = $doc;
                    // dump($adr->adr_id);
            }
        }

        $sps =[];

        // dd(SpecialiseIn::where('doc_id', 62)->get());
        foreach (SpecialiseIn::all() as $sp)
        {
            foreach (Specialtie::where('sp_id', $sp->sp_id)->get('name') as $spv)
            {
                $sps[] = $sp->doc_id . ',' . $spv->name;
            }
        } 

        return view('home', [
            'sps' => Specialtie::all(),
            'doc_sps' => $sps,
            'cs' => City::all(),
            'docs' => $docs,
            'adr' => Address::all(),
            'is_doctor' => Doctor::where('user_id', Auth::user()->user_id)->exists(),
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home', [
            'sps' => Specialtie::all(),
            'cs' => City::all(),
            'is_doctor' => Doctor::where('user_id', Auth::user()->user_id)->exists(),
        ]);
    }
}
