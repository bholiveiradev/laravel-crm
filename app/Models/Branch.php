<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'document',
        'name',
        'alias',
        'phone',
        'celphone',
        'email',
        'site',
        'picture',
        'zipcode',
        'address',
        'number',
        'district',
        'complement',
        'city',
        'state',
        'active'
    ];

    public function setDocumentAttribute($value)
    {
        $this->attributes['document'] = numbersOnly($value);
    }

    public function setPhoneAttribute($value)
    {
        $this->attributes['phone'] = numbersOnly($value);
    }

    public function getPhoneAttribute($value)
    {
        return $this->attributes['phone'] = phoneMask($value);
    }

    public function setCelphoneAttribute($value)
    {
        $this->attributes['celphone'] = numbersOnly($value);
    }

    public function getCelphoneAttribute($value)
    {
        return $this->attributes['celphone'] = phoneMask($value);
    }

    public function setZipcodeAttribute($value)
    {
        $this->attributes['zipcode'] = numbersOnly($value);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
