<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'debts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'kind', 'amount', 'date_end', 'completed', 'created_at', 'updated_at', 'deleted_at'
    ];

    public $timestamps = true;
}
