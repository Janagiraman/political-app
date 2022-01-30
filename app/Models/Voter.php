<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'booth_no',
        'booth_name',
        'voter_name',
        'area_name',
        'ward_name',
        'sl_no',
        'relation_name',
        'gender',
        'epic_no',
        'age'        
    ];
}
