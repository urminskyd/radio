<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Radio extends Model
{
    use HasFactory;

    protected $fillable = [
        'radio_url',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /* ************************ RELATIONSHIPS ************************* */

    public function songs()
    {
        return $this->hasMany(Song::class);
    }
}
