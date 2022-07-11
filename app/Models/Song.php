<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'radio_id',
        'name',
        'time',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /* ************************ ACCESSORS ************************* */

    public function getCreatedAtAttribute($date)
    {
        return Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }

    /* ************************ RELATIONSHIPS ************************* */

    public function radio()
    {
        return $this->belongsTo(Radio::class);
    }
}
