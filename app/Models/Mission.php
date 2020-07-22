<?php

namespace App\Models;

use App\Helpers\Constants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'missions';

    protected $primaryKey = 'user_id';

    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'mission_1', 'mission_2', 'mission_3', 'mission_4', 'mission_5',
        'mission_6', 'mission_7', 'mission_8', 'mission_9'
    ];
    
}
