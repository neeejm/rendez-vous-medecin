<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SpecialiseIn;
use App\Models\Specialtie;
use App\Models\User;
use App\Models\Address;
use App\Models\Doctor;
use App\Models\City;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ApplyController extends Controller
{
    use RegistersUsers;
    //
    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'fname' => ['required', 'string', 'max:125'],
            'lname' => ['required', 'string', 'max:125'],
            'phone_num' => ['required', 'string', 'max:10', 'digits:10', 'regex:/^0[567][0-9]{8}$/i'],
            'fax_num' => ['required', 'string', 'max:10', 'digits:10', 'regex:/^0[567][0-9]{8}$/i'],
            'gender' => ['required', 'boolean'],
            // 'zip' => ['required', 'string', 'max:5', 'digits:5' , 'regex:/^[1-9][0-9]{4}$/i'],
        ]);
    }

    protected function create(array $data)
    {
        DB::beginTransaction();

        try
        {
            $user =  User::create([
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'user_type' => config('global.doctor'),
            ]);

            $user->doctor = Doctor::create([
                'user_id' => $user->user_id,
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'phone_num' => $data['phone_num'],
                'fax_num' => $data['fax_num'],
                'gender' => $data['gender'],
            ]);

            $user->doctor->address = Address::create([
                'doc_id' => $user->doctor->doc_id,
                'address' => $data['address'],
                'zip' => $data['zip'],
                'ci_id' => $data['city'],
            ]);

            foreach($data['sps'] as $value)
            {
                $user->doctor->specialiseIn = SpecialiseIn::create([
                    'doc_id' => $user->doctor->doc_id,
                    'sp_id' => $value,
                ]);
            }

        }
        catch(Throwable $e)
        {
            DB::rollback();
        }
        DB::commit();
        return $user;
    }

    public function index()
    {
        // foreach (City::all() as $test) {
        //     echo $test->city;
        //     echo " --- :id: $test->ci_id --- ";
        // }

        return view('user.apply', [
            'sps' => Specialtie::all(),
            'cs' => City::all(),
        ]);
    }
}
