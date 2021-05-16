<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialtie extends Model
{
    use HasFactory;

    protected $sps = [
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

    protected $table = 'specialties';

    protected $primaryKey = 'sp_id';

    protected $fillable = [
        'name',
    ];

    /**
     * The doctor that belong to the Specialtie
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function doctor(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class);
    }
}
