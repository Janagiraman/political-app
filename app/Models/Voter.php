<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VoterInfo;
use App\Models\VoterService;

class Voter extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'booth_no',
        'booth_name',
        'voter_name',
        'area_name',
        'ward_name',
        'relation_name',
        'gender',
        'epic_no',
        'age',
        'user_id',
        'import_by'      
    ];
    
    public function voterInfo()
    {
        return $this->belongsTo(VoterInfo::class);
    }

    public function voterService()
    {
        return $this->hasOne(VoterService::class);
    }


}
