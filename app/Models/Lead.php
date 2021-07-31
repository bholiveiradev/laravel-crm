<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'document', 'name', 'alias', 'phone', 'celphone', 'email', 'site', 'zipcode', 'address', 'number', 'district', 'complement', 'city', 'state', 'comments'
    ];

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
