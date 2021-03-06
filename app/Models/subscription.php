<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'date_deb',
        'date_fin',
    ];

    //record link user
    public function user()
    {
        return $this->belongTo(User::class);
    }
}
