<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Address;
use App\Models\SpecialiseIn;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DoctorsSeeder extends Seeder
{
    protected $mdocs = [
        'Abdelaziz Salem',
        'Zaubayr Bourkia',
        'Lahcen Abécassis',
        'Brahim Chaoui',
        'Sadid Akhrif',
        'Quds Said',
        'Hamza Yassine',
        'Farid Bennis',
        'Amaniyy Lemsih',
        'Zamen Benjelloun',
        'Asil Leghlid',
        'Waqqas Raihani',
        'Abdullah Rhozali',
        'Waliedine Mejjati',
        'Marzuq Hajji',
        'Hakem Mansouri',
        'Asil Barakat',
        'Waqqas Benchemsi',
        'Muwaffaq Lahbabi',
        'Youssouf Salem',
        'Elias Jouiti',
        'Mojiz Tawil',
        'Abdelilah Ben Bouchta',
        'Wasif Daoud',
        'Quds Skali',
        'Jamaldine Barbery',
        'Abdellatif Sahimi',
        'Hadir Lahlou',
        'Younes Toulali',
        'Farid Torres',
    ];

    protected $fdocs = [
        'Bahae Said',
        'Sulayma Benjelloun',
        'Zinah Serghini',
        'Sabreen al-Fassi',
        'Alzahra Lahbabi',
        'Shukriya ibn al-Hassan',
        'Fairouz Menebhi',
        'Anaan Bouzfour',
        'Mahdia Barakat',
        'Tahani Bahéchar',
        'Balqis Siqli',
        'Malika Elalamy',
        'Darifa Mansouri',
        'Tissam Bennouna',
        'Ayesha Sahimi',
        'Yasmina Benjelloun',
        'Aider El-Moustaoui',
        'Najiha al-Makki',
        'Ghaada El Hajjam',
        'Nyla al-Tayyeb',
        'Masuda Idrissi',
        'Kamar Lahbabi',
        'Khadija Laroui',
        'Mahdia Ben Bouchta',
        'Masuda Ferhat',
        'Rahida al-Ghumari',
        'Gadwa Zafzaf',
        'Aziza al-Buzidi',
        'Reema  Raihani',
        'Shenaz Nissaboury',
    ];  
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $n = 1;

        for($i = 0; $i < 2; $i++)
        {
            if ($i == 0)
            {
                $docs = $this->fdocs;
                $path = 'fdoctor';
            }
            else
            {
                $docs = $this->mdocs;
                $path = 'mdoctor';
            }

            foreach($docs as $value)
            {
                $fname = strtolower(explode(' ', $value)[0]);
                $lname = strtolower(explode(' ', $value)[1]);

                DB::beginTransaction();

                try
                {
                    $user = User::create([
                        'username' => $fname . $n,
                        'email' => "$fname.$lname@mail.com",
                        'password' => '$2y$12$fQ3QjRL.7L91r6jpWf222ug8jgKITh79auzPvCmb/AvhsKpYe7E/q',
                        'user_type' => config('global.doctor'),
                        'email_verified_at' => Carbon::now(),
                    ]);

                    $user->doctor = Doctor::create([
                        'user_id' => $user->user_id, 
                        'fname' => $fname,
                        'lname' => $lname, 
                        'phone_num' => $this->phoneFaker('p'), 
                        'fax_num' => $this->phoneFaker('f'), 
                        'comment' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Commodi iusto aspernatur qui possimus unde inventore quae repellat deserunt molestias blanditiis error delectus assumenda velit eius, quo magni asperiores nam ullam?',
                        'img' => "images/$path",
                        'gender' => $i,
                        'is_valid' => 1,
                    ]);

                    $user->doctor->address = Address::create([
                        'doc_id' => $user->doctor->doc_id,
                        'address' => 'Morocco, Africa, Earth, Milky Way',
                        'zip' => rand(10000, 99999),
                        'ci_id' => rand(1, 45),
                    ]);

                    $ids = [];
                    for($j = 0; $j < rand(1, 3); $j++)
                    {
                        // get a unique sp_id
                        do
                        {
                            $rid = rand(1, 80);
                        }
                        while(in_array($rid, $ids));
                        $ids[] = $rid;

                        $user->doctor->specialiseIn = SpecialiseIn::create([
                            'doc_id' => $user->doctor->doc_id,
                            'sp_id' => $rid,
                        ]);
                    }
                }
                catch(Throwable $e)
                {
                    DB::rollback();
                }
                DB::commit();
                $n++;
            }
        }
    }

    private function phoneFaker($type)
    {
        $num = ($type == 'p') ? '06' : '05';
        for($i = 0; $i < 8; $i++) 
        { 
            $num .= strval(rand(0, 9)); 
        }

        return $num;
    }
    
    private function uniqRand($min, $max) {

    }
}
