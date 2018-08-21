<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserVerification extends Model
{
    protected $fillable = [
        'token',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
