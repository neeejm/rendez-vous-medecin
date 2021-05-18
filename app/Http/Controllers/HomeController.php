<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialiseIn;
use App\Models\Specialtie;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Address;

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
        foreach (Doctor::all() as $doc) 
        {
            foreach($tmp as $id)
            {
                // dump($doc->doc_id);
                if ($doc->doc_id == $id)
                    // dump($id);
                    $docs[] = $doc;
            }
        }

        // dd('nay');
        // dd($docs);

        return view('home', [
            'sps' => Specialtie::all(),
            'cs' => City::all(),
            'docs' => $docs,
        ]);
    }

    public function findAll(Request $request)
    {
       return view('home', [
            'sps' => Specialtie::all(),
            'cs' => City::all(),
            'docs' => Doctor::all(),
        ]);
    }

    public function findName(Request $request)
    {
        $docs = [];

        if ($request->name)
        {
            foreach (Doctor::all() as $doc)
            {
                if (str_contains($doc->fname, $request->name) || str_contains($doc->lname, $request->name))
                    $docs[] = $doc;
                    // dump($adr->adr_id);
            }
        }
       return view('home', [
            'sps' => Specialtie::all(),
            'cs' => City::all(),
            'docs' => $docs,
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
        ]);
    }
}
