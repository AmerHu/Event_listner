<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory,HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function department(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Department', 'company_id', 'id');
    }
}
