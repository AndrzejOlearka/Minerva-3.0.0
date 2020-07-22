<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user', 'email', 'password', 'level', 'exp', 'coins', 'premium_end', 'id_guild',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function guild()
    {
        return $this->belongsTo(Guild::class, 'id_guild');
    }

    public function moderator()
    {
        return $this->hasOne(Moderator::class, 'user_id');
    }

    public function bans()
    {
        return $this->hasMany(BannedUser::class, 'user_id')->withoutTrashed();
    }

    public function basicMinerals()
    {
        return $this->hasOne(BasicMineral::class);
    }

    public function advancedMinerals()
    {
        return $this->hasOne(AdvancedMineral::class);
    }

    public function expedition()
    {
        return $this->hasOne(Expedition::class);
    }

    public function trip()
    {
        return $this->hasOne(Trip::class);
    }

    public function mine()
    {
        return $this->hasOne(Mine::class);
    }

    public function mission()
    {
        return $this->hasOne(Mission::class);
    }

    public function offers()
    {
        return $this->hasMany(MarketOffer::class);
    }
}
    
