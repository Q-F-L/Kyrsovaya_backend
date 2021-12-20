<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Touragent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'country',
        'face_img',
        'rating',
        'description',
        'password'
    ];

    protected $hidden = [
        'password',
        'rememberToken',
    ];

    public function tour()
    {
        return $this->hasMany(Tour::class);
    }
}
