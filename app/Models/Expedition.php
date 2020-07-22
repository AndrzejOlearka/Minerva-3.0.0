<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expedition extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'expeditions';

    protected $primaryKey = 'user_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'action_number', 'action_prize', 'date_start', 'date_end'
    ];
}
