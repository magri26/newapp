<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'emial',
        'phone',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_user');
    }
}
