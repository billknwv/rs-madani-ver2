<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'specialization',
        'clinic',
        'photo',
        'description',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
