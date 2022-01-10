<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Vocces\Company\Domain\ValueObject\CompanyStatus;

class Company extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
       
    ];

    public function contacts(){
        return $this->hasMany(Contact::class, 'ownerid','id');
    }
    public function addresses(){
        return $this->hasMany(Address::class, 'ownerid','id');
    }

    public function statuses()
    {
        return $this->hasOne(CompanyStatus::class, 'ownerid','id');
    }

}
