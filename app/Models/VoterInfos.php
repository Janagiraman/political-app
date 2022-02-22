<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\voter;
use App\Models\User;
class VoterInfos extends Model
{
    use HasFactory;

    public function voter()
    {
        return $this->hasOne(Voter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
