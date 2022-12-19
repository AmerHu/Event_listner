<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory,HasFactory;

    protected $fillable = [
        'name',
        'image',
        'department_id',
    ];

    public function decrements():\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Department', 'department_id', 'id');
    }
}
