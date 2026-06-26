<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'features',
        'related_clinics',
        'icon',
        'image',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'related_clinics' => 'array',
        ];
    }

    public function doctors()
    {
        if (!$this->related_clinics) {
            return collect();
        }
        return Doctor::whereIn('clinic', $this->related_clinics)->get();
    }
}
