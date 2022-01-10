<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = "contacts";
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
     protected $fillable = [
        'id',
        'ownerid',
        'value',
        'type',
        
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class,'id','ownerid');
    }

}