<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'username' => 'root',
            'email' => 'testing.pfa@gmail.com',
            'password' => '$2y$12$r6EUpG01HJoACXE79ERXpe4R70oylmcV3r1ZFjjNzUdNE6sDlf6IO',
            'user_type' => config('global.admin'),
            'email_verified_at' => Carbon::now(),
        ]);
    }
}
