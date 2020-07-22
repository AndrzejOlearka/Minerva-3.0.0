<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'guilds';

    public $timestamps = false;

    protected $fillable = ['name', 'leader_id', 'description', 'avatar'];

    public function users()
    {
        return $this->hasMany(User::class, 'id_guild');
    }
}
