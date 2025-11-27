<?php

namespace Database\Seeders;

use App\Models\Planet;
use Illuminate\Database\Seeder;

class PlanetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planets = [
            [
                'name_fr' => 'Mercure',
                'name_en' => 'Mercury',
                'image' => '/images/planets/mercury.jpg',
                'description_fr' => 'Première planète du système solaire, Mercure est une petite planète rocheuse très proche du Soleil. Sa surface est criblée d\'impacts et ses températures varient fortement.',
                'description_en' => 'The first planet of the solar system, Mercury is a small rocky planet very close to the Sun. Its surface is full of craters and it has extreme temperature variations.',
                'distance_fr' => '91 mil. km',
                'distance_en' => '91 mil. km',
                'travel_fr' => '6-7 mois',
                'travel_en' => '6-7 months',
            ],
            [
                'name_fr' => 'Lune',
                'name_en' => 'Moon',
                'image' => '/assets/destination/image-moon.png',
                'description_fr' => 'Voyez notre planète comme vous ne l\'avez jamais vue auparavant. Un voyage de détente parfait pour vous aider à retrouver de la perspective et revenir rafraîchi. Pendant que vous êtes là-bas, visitez les sites d\'atterrissage de Luna 2 et Apollo 11.',
                'description_en' => 'See our planet as you\'ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you\'re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.',
                'distance_fr' => '384 400 km',
                'distance_en' => '384,400 km',
                'travel_fr' => '3 jours',
                'travel_en' => '3 days',
            ],
            [
                'name_fr' => 'Mars',
                'name_en' => 'Mars',
                'image' => '/assets/destination/image-mars.png',
                'description_fr' => 'Ne vous laissez pas tromper par la teinte rougeâtre - Mars est en fait froide ! Cette planète désertique est notre meilleure chance de colonisation dans un avenir proche, mais les températures moyennes oscillent autour de -60°C.',
                'description_en' => 'Don\'t forget to pack your hiking boots. You\'ll need them to tackle Olympus Mons, the tallest planetary mountain in our solar system. It\'s two and a half times the size of Everest!',
                'distance_fr' => '225 mil. km',
                'distance_en' => '225 mil. km',
                'travel_fr' => '9 mois',
                'travel_en' => '9 months',
            ],
            [
                'name_fr' => 'Europe',
                'name_en' => 'Europa',
                'image' => '/assets/destination/image-europa.png',
                'description_fr' => 'La plus petite des quatre lunes galiléennes de Jupiter, Europe est une destination incontournable pour les amateurs d\'aventure. Avec sa surface glacée, elle abrite un océan profond sous sa croûte - un endroit parfait pour la vie extraterrestre !',
                'description_en' => 'The smallest of the four Galilean moons orbiting Jupiter, Europa is a winter lover\'s dream. With an icy surface, it\'s perfect for a bit of ice skating, curling, hockey, or simple relaxation in your snug wintery cabin.',
                'distance_fr' => '628 mil. km',
                'distance_en' => '628 mil. km',
                'travel_fr' => '3 ans',
                'travel_en' => '3 years',
            ],
            [
                'name_fr' => 'Titan',
                'name_en' => 'Titan',
                'image' => '/assets/destination/image-titan.png',
                'description_fr' => 'Le seul satellite naturel connu à avoir une atmosphère dense autre que la Terre, Titan est un foyer loin de la maison (juste quelques centaines de millions de kilomètres !). En tant que bonus, vous profitez de certains des paysages les plus spectaculaires de notre système solaire.',
                'description_en' => 'The only moon known to have a dense atmosphere other than Earth, Titan is a home away from home (just a few hundred degrees colder!). As a bonus, you get striking views of the Rings of Saturn.',
                'distance_fr' => '1,6 mrd. km',
                'distance_en' => '1.6 bil. km',
                'travel_fr' => '7 ans',
                'travel_en' => '7 years',
            ],
        ];

        foreach ($planets as $planet) {
            Planet::create($planet);
        }
    }
}
