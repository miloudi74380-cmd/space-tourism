<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'name_fr',
        'name_en',
        'description_fr',
        'description_en',
        'image_landscape',
        'image_portrait',
    ];

    /**
     * Get name in current locale
     */
    public function getName()
    {
        $locale = app()->getLocale();
        return $this->{"name_{$locale}"};
    }

    /**
     * Get description in current locale
     */
    public function getDescription()
    {
        $locale = app()->getLocale();
        return $this->{"description_{$locale}"};
    }
}
