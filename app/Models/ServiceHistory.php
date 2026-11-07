<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Appointment;

class ServiceHistory extends Model
{
    protected $fillable = [
        'client_id',
        'appointment_id',
        'service_date',
        'service_type',
        'device_appliance',
        'diagnostics_problem',
        'service_fee',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }
    
}