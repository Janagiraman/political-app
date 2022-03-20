<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Service;
use App\Models\Voter;

class VoterService extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function voter()
    {
        return $this->belongsTo(Voter::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class,'service_type');
    }
}
