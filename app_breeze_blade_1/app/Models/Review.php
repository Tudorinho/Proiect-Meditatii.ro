<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'elev_id',
        'profesor_id',
        'mesaj',
        'rating',
        'nota',
    ];

    public function profesor()
    {
        return $this->belongsTo(User::class, 'profesor_id');
    }

    public function elev()
    {
        return $this->belongsTo(User::class, 'elev_id');
    }
}
