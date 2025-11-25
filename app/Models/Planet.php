<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    protected $fillable = [
        'name_fr',
        'name_en',
        'image',
        'description_fr',
        'description_en',
        'distance_fr',
        'distance_en',
        'travel_fr',
        'travel_en',
    ];

    /**
     * Get the name in the current locale
     */
    public function getName()
    {
        $locale = app()->getLocale();
        return $this->{"name_{$locale}"};
    }

    /**
     * Get the description in the current locale
     */
    public function getDescription()
    {
        $locale = app()->getLocale();
        return $this->{"description_{$locale}"};
    }

    /**
     * Get the distance in the current locale
     */
    public function getDistance()
    {
        $locale = app()->getLocale();
        return $this->{"distance_{$locale}"};
    }

    /**
     * Get the travel time in the current locale
     */
    public function getTravel()
    {
        $locale = app()->getLocale();
        return $this->{"travel_{$locale}"};
    }
}
