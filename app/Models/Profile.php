<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['username', 'address', 'phone'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
