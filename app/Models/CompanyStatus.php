<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyStatus extends Model
{
    use HasFactory;

    protected $table = "statuses";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
     protected $fillable = [
        'id',
        'ownerid',
        'status'
        
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class,'id','ownerid');
    }

}