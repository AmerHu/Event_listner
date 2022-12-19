<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory,HasFactory;

    protected $fillable = [
        'name',
        'image',
        'company_id',
    ];

    public function employee(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Employee', 'employee_id', 'id');
    }

    public function company():\Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Company', 'company_id', 'id');
    }
}
