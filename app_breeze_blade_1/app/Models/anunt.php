<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anunt extends Model
{
    use HasFactory;

     /**
     * Atributele care pot fi umplute.
     *
     * @var array
     */
    protected $table = 'anunturi';
    protected $fillable = [
        'user_id', 'titlu', 'continut', 'subiect',
    ];

    /**
     * Relație către modelul User (profesor).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Restul codului modelului...

    /**
     * Accessor pentru a obține numele complet al profesorului din anunț.
     */
    public function getUserId()
    {
        return "{$this->user_id}";
    }
}
