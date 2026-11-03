<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    protected $fillable = [
        'name',
        'address',
        'contact_information',
    ];

    public function appointments(): HasMany
    {
    return $this->hasMany(Appointment::class);
    }
}
