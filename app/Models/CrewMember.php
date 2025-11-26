<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrewMember extends Model
{
    protected $fillable = [
        'name',
        'role_fr',
        'role_en',
        'bio_fr',
        'bio_en',
        'image',
    ];

    /**
     * Get role in current locale
     */
    public function getRole()
    {
        $locale = app()->getLocale();
        return $this->{"role_{$locale}"};
    }

    /**
     * Get bio in current locale
     */
    public function getBio()
    {
        $locale = app()->getLocale();
        return $this->{"bio_{$locale}"};
    }
}
