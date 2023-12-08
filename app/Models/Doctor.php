<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Doctor extends Authenticatable
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'password',
        'phone',
        'city',
        'image',
        'major_id',
    ];
    function major(){
        return $this->belongsTo(Major::class);
    }
}
