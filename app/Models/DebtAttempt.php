<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DebtAttempt extends Model
{
    protected $table = 'debts_attempts';

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id', 'percentage', 'type', 'successful', 'created_at', 'updated_at',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
