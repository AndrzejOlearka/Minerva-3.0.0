<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Moderator extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'moderators';

    /**
     * primary_key
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * timestamps options
     *
     * @var string
     */
    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'type', 'advance_day'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
