<?php

namespace Database\Seeders;

use App\Models\CrewMember;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrewMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $crewMembers = [
            [
                'name' => 'Douglas Hurley',
                'role_fr' => 'Commandant',
                'role_en' => 'Commander',
                'bio_fr' => 'Douglas Gerald Hurley est un ingénieur américain, ancien pilote du Corps des Marines et ancien astronaute de la NASA. Il s\'est lancé dans l\'espace pour la troisième fois en tant que commandant de Crew Dragon Demo-2.',
                'bio_en' => 'Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.',
                'image' => '/assets/crew/image-douglas-hurley.png',
            ],
            [
                'name' => 'Mark Shuttleworth',
                'role_fr' => 'Spécialiste de mission',
                'role_en' => 'Mission Specialist',
                'bio_fr' => 'Mark Richard Shuttleworth est le fondateur et PDG de Canonical, la société derrière le système d\'exploitation Ubuntu basé sur Linux. Shuttleworth est devenu le premier Sud-Africain à voyager dans l\'espace en tant que touriste spatial.',
                'bio_en' => 'Mark Richard Shuttleworth is the founder and CEO of Canonical, the company behind the Linux-based Ubuntu operating system. Shuttleworth became the first South African to travel to space as a space tourist.',
                'image' => '/assets/crew/image-mark-shuttleworth.png',
            ],
            [
                'name' => 'Victor Glover',
                'role_fr' => 'Pilote',
                'role_en' => 'Pilot',
                'bio_fr' => 'Pilote du premier vol opérationnel du SpaceX Crew Dragon vers la Station spatiale internationale. Glover est commandant dans la marine américaine où il pilote un F/A-18. Il était membre d\'équipage de l\'Expédition 64 et a servi comme ingénieur de vol des systèmes de la station.',
                'bio_en' => 'Pilot on the first operational flight of the SpaceX Crew Dragon to the International Space Station. Glover is a commander in the U.S. Navy where he pilots an F/A-18. He was a crew member of Expedition 64, and served as a station systems flight engineer.',
                'image' => '/assets/crew/image-victor-glover.png',
            ],
            [
                'name' => 'Anousheh Ansari',
                'role_fr' => 'Ingénieure de vol',
                'role_en' => 'Flight Engineer',
                'bio_fr' => 'Anousheh Ansari est une ingénieure irano-américaine et cofondatrice de Prodea Systems. Ansari était la quatrième touriste spatiale autofinancée, la première femme autofinancée à voler vers l\'ISS et la première Iranienne dans l\'espace.',
                'bio_en' => 'Anousheh Ansari is an Iranian American engineer and co-founder of Prodea Systems. Ansari was the fourth self-funded space tourist, the first self-funded woman to fly to the ISS, and the first Iranian in space.',
                'image' => '/assets/crew/image-anousheh-ansari.png',
            ],
        ];

        foreach ($crewMembers as $member) {
            CrewMember::firstOrCreate(
                ['name' => $member['name']],
                $member
            );
        }
    }
}
