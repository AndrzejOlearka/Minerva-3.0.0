<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannedUser extends Model
{
    use SoftDeletes;
    
    const REASON_BEHAVIOUR = 1;

    const REASON_NICK = 2;
    
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'banned_users';
    
    public $timestamps = true;

    protected $fillable = [
        'user_id', 'date_end', 'reason', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
