<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RouteTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test Home page in French
     */
    public function test_home_page_loads_successfully_in_french(): void
    {
        $response = $this->withSession(['locale' => 'fr'])->get('/');

        $response->assertStatus(200);
        $response->assertSee('Space Tourism - Accueil', false);
        $response->assertSee('Alors, vous voulez voyager dans');
        $response->assertSee('l\'espace');
        $response->assertSee('Explorer');
    }

    /**
     * Test Home page in English
     */
    public function test_home_page_loads_successfully_in_english(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/');

        $response->assertStatus(200);
        $response->assertSee('Space Tourism - Home', false);
        $response->assertSee('So, you want to travel to');
        $response->assertSee('space');
        $response->assertSee('Explore');
    }

    /**
     * Test Destination page in French
     */
    public function test_destination_page_loads_successfully_in_french(): void
    {
        $response = $this->withSession(['locale' => 'fr'])->get('/destination');

        $response->assertStatus(200);
        $response->assertSee('Space Tourism - Destination', false);
        $response->assertSee('Choisissez votre destination');
        $response->assertSee('Lune');
        $response->assertSee('Distance moy.');
    }

    /**
     * Test Destination page in English
     */
    public function test_destination_page_loads_successfully_in_english(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/destination');

        $response->assertStatus(200);
        $response->assertSee('Space Tourism - Destination', false);
        $response->assertSee('Pick your destination');
        $response->assertSee('Moon');
        $response->assertSee('Avg. distance');
    }

    /**
     * Test Crew page in French
     */
    public function test_crew_page_loads_successfully_in_french(): void
    {
        $response = $this->withSession(['locale' => 'fr'])->get('/crew');

        $response->assertStatus(200);
        $response->assertSee('Space Tourism - Équipage', false);
        $response->assertSee('Rencontrez votre équipage');
        $response->assertSee('Commandant');
        $response->assertSee('Douglas Hurley');
    }

    /**
     * Test Crew page in English
     */
    public function test_crew_page_loads_successfully_in_english(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/crew');

        $response->assertStatus(200);
        $response->assertSee('Space Tourism - Crew', false);
        $response->assertSee('Meet your crew');
        $response->assertSee('Commander');
        $response->assertSee('Douglas Hurley');
    }

    /**
     * Test Technology page in French
     */
    public function test_technology_page_loads_successfully_in_french(): void
    {
        $response = $this->withSession(['locale' => 'fr'])->get('/technology');

        $response->assertStatus(200);
        $response->assertSee('Space Tourism - Technologie', false);
        $response->assertSee('Lancement spatial 101');
        $response->assertSee('La terminologie...');
        $response->assertSee('Lanceur');
    }

    /**
     * Test Technology page in English
     */
    public function test_technology_page_loads_successfully_in_english(): void
    {
        $response = $this->withSession(['locale' => 'en'])->get('/technology');

        $response->assertStatus(200);
        $response->assertSee('Space Tourism - Technology', false);
        $response->assertSee('Space launch 101');
        $response->assertSee('The terminology...');
        $response->assertSee('Launch vehicle');
    }

    /**
     * Test language switch to French
     */
    public function test_language_switch_to_french(): void
    {
        $response = $this->withSession([])->get('/language/fr');

        $response->assertStatus(302); // Redirect
        $response->assertRedirect();
        $response->assertSessionHas('locale', 'fr');
    }

    /**
     * Test language switch to English
     */
    public function test_language_switch_to_english(): void
    {
        $response = $this->withSession([])->get('/language/en');

        $response->assertStatus(302); // Redirect
        $response->assertRedirect();
        $response->assertSessionHas('locale', 'en');
    }

    /**
     * Test invalid language returns 400
     */
    public function test_invalid_language_returns_400(): void
    {
        $response = $this->get('/language/invalid');

        $response->assertStatus(400);
    }

    /**
     * Test navigation menu contains correct links
     */
    public function test_navigation_menu_contains_correct_links(): void
    {
        $response = $this->withSession(['locale' => 'fr'])->get('/');

        $response->assertStatus(200);
        $response->assertSee('href="/"', false);
        $response->assertSee('href="/destination"', false);
        $response->assertSee('href="/crew"', false);
        $response->assertSee('href="/technology"', false);
    }
}
