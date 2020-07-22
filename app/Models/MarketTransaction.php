<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketTransaction extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'offer_id', 'amount', 'total', 'created_at', 'updated_at'
    ];

    public function offer()
    {
        return $this->belongsTo(MarketOffer::class);
    }
}
    
