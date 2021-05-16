<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialtie;

class SpecialtiesSeeder extends Seeder
{
    private $sps = [
        "Médecin généraliste",
        "Ophtalmologue",
        "Oto-Rhino-Laryngologiste ORL",
        "Dermatologue",
        "Pédiatre",
        "Dentiste",
        "Gynécologue",
        "Gastrologue-Entérologue",
        "Cardiologue",
        "Chirurgien Général",
        "Urologue",
        "Traumatologue Orthopédiste",
        "Anesthésiste-Réanimateur",
        "Gynécologue Obstétricien",
        "Neuropsychiatre",
        "Radiologue",
        "Pneumo-Phtisiologue",
        "Rhumatologue",
        "Psychiatre",
        "Neurochirurgien",
        "Neurologue",
        "Néphrologue",
        "Biologiste",
        "Interniste",
        "Chirurgien Dentiste",
        "Endocrinologue diabétologue et maladies métaboliques",
        "Médecin du travail",
        "Allergologue",
        "Anatomo-pathologiste",
        "Diabétologue nutritionniste",
        "Chirurgien esthétique et plastique",
        "Cardio Vasculaire",
        "Chirurgien Cardio Vasculaire",
        "Hématologue",
        "Chirurgien pédiatrique",
        "Stomatologue et chirurgien maxillo-facial",
        "Radiologue",
        "Chirurgien vasculaire périphérique",
        "Traumatologue",
        "Chirurgien thoracique",
        "Médecin du Sport",
        "Chirurgien Maxillo-Facial",
        "Kinésithérapeute",
        "Cancérologue",
        "Médecin physique et réadaptation fonctionnelle",
        "Oncologue médical",
        "Pédopsychiatre",
        "Opticien",
        "Médecin Légale et du Travail",
        "Médecin de rééducation réadaptation fonctionnelle",
        "Addictologue",
        "Radiologue Radio-Isotopie",
        "Immunologiste",
        "Médecin spécialiste des maladies infectieuses",
        "Endodontiste",
        "Orthodontiste",
        "Chirurgien cancérologue",
        "Médecin spécialiste en Médecine nucléaire",
        "Greffe osseuse",
        "Psychothérapeute",
        "Médecin communautaire",
        "Chirurgien Infantile",
        "Micronutrition",
        "Acupuncture",
        "Gériatre",
        "Implantologist",
        "Endocrinologue",
        "Gastro-entérologue",
        "Proctologue",
        "Hollywood smile",
        "Coaching",
        "Psychonutrition",
        "Couronne dentaire",
        "Aroma-thérapeute",
        "Thérapies",
        "Prothese dentaire",
        "Esthétique dentaire",
        "Médecine Esthétique",
        "Lasers Médicaux",
        "Médecine Régénérative",
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        foreach($this->sps as $value)
        {
            Specialtie::create([
                'name' => $value,
            ]);

            // DB::table('specialties')->insert(
            //     array(
            //         'name' => $value,
            //     )
            // );
        }
    }
}
