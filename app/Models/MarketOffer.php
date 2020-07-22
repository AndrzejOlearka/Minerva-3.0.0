<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketOffer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'mineral', 'amount', 'cost', 'created_at', 'updated_at', 'deleted_at',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transactions()
    {
        return $this->hasMany(MarketTransaction::class, 'offer_id');
    }

    public function transactionSums() {

        return $this->hasMany(MarketTransaction::class, 'offer_id')->selectRaw('sum(total) as total_transaction');
    }
}
    
