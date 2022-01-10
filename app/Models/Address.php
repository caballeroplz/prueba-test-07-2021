<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = "addresses";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'street',
        'streetnumber',
        'floor',
        'letter',
        'postalcode',
        'city',
        'province',
        'country',
        'ownerid',
        
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class,'id','ownerid');
    }
}
