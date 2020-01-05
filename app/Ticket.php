<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status_id'
    ];

    public function replies()
    {
        return $this->hasMany(\App\Reply::class);
    }
    public function status()
    {
        return $this->belongsTo(\App\Status::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class,'created_by');
    }

}
