<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_id',
        'type',
        'details',
        'scheduled_at',
        'completed_at',
        'user_id',
    ];

    protected $dates = [
        'scheduled_at',
        'completed_at',
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTypeAttribute($value)
    {
        return ucfirst($value);
    }

    public function setTypeAttribute($value)
    {
        $this->attributes['type'] = strtolower($value);
    }

    public function scopeEmail($query)
    {
        return $query->where('type', 'email');
    }

    public function scopeSms($query)
    {
        return $query->where('type', 'sms');
    }
}
