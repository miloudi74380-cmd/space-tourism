<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'name_fr' => 'Lanceur',
                'name_en' => 'Launch vehicle',
                'description_fr' => 'Un lanceur ou fusée porteuse est un véhicule propulsé par fusée utilisé pour transporter une charge utile de la surface de la Terre vers l\'espace, généralement vers l\'orbite terrestre ou au-delà. Notre fusée porteuse WEB-X est la plus puissante en opération. Mesurant 150 mètres de haut, c\'est un spectacle impressionnant sur la rampe de lancement !',
                'description_en' => 'A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth\'s surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it\'s quite an awe-inspiring sight on the launch pad!',
                'image_landscape' => '/assets/technology/image-launch-vehicle-landscape.jpg',
                'image_portrait' => '/assets/technology/image-launch-vehicle-portrait.jpg',
            ],
            [
                'name_fr' => 'Port spatial',
                'name_en' => 'Spaceport',
                'description_fr' => 'Un port spatial ou cosmodrome est un site de lancement (ou de réception) d\'engins spatiaux, par analogie au port maritime pour les navires ou à l\'aéroport pour les avions. Basé dans le célèbre Cap Canaveral, notre port spatial est idéalement situé pour profiter de la rotation de la Terre pour le lancement.',
                'description_en' => 'A spaceport or cosmodrome is a site for launching (or receiving) spacecraft, by analogy to the seaport for ships or airport for aircraft. Based in the famous Cape Canaveral, our spaceport is ideally situated to take advantage of the Earth\'s rotation for launch.',
                'image_landscape' => '/assets/technology/image-spaceport-landscape.jpg',
                'image_portrait' => '/assets/technology/image-spaceport-portrait.jpg',
            ],
            [
                'name_fr' => 'Capsule spatiale',
                'name_en' => 'Space capsule',
                'description_fr' => 'Une capsule spatiale est un vaisseau spatial souvent habité qui utilise une capsule de rentrée à corps émoussé pour rentrer dans l\'atmosphère terrestre sans ailes. Notre capsule est l\'endroit où vous passerez votre temps pendant le vol. Elle comprend une salle de sport spatiale, un cinéma et de nombreuses autres activités pour vous divertir.',
                'description_en' => 'A space capsule is an often-crewed spacecraft that uses a blunt-body reentry capsule to reenter the Earth\'s atmosphere without wings. Our capsule is where you\'ll spend your time during the flight. It includes a space gym, cinema, and plenty of other activities to keep you entertained.',
                'image_landscape' => '/assets/technology/image-space-capsule-landscape.jpg',
                'image_portrait' => '/assets/technology/image-space-capsule-portrait.jpg',
            ],
        ];

        foreach ($technologies as $tech) {
            Technology::firstOrCreate(
                ['name_en' => $tech['name_en']],
                $tech
            );
        }
    }
}
