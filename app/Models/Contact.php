<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'profile',
        'address',
        'job_title',
        'company',
        'note',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function emails()
    {
        return $this->hasMany(Email::class, 'contact_id');
    }

    public function phones()
    {
        return $this->hasMany(Phone::class, 'contact_id');
    }

    public function connections()
    {
        return $this->hasMany(Connection::class, 'contact_id');
    }
}
