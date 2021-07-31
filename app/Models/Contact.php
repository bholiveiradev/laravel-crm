<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'date', 'time', 'comments', 'user_id'
    ];

    public function setDateAttribute($value)
    {
    	$this->attributes['date'] = implode('-', array_reverse(explode('/', $value)));
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
