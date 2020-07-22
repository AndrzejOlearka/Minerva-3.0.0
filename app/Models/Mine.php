<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Mine extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'mines';

    protected $primaryKey = 'user_id';
    
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'ambers', 'agates', 'malachites', 'turquoises', 'amethysts', 'topazes', 
        'emeralds', 'rubies', 'sapphires', 'diamonds', 'silver', 'gold'
    ];

    public function increments($action, $value)
    {
        if(is_null($this->$action)){
            $this->update([$action => $value]);
        }
        $this->increment($action, $value);
        return $this;
    }

    public static function getAllMines()
    {

        $query = 'SHOW COLUMNS FROM mines';
        $column_name = 'Field';
        $columns = [];

        foreach(DB::select($query) as $column)
        {
            $columns[] = $column->$column_name; 
        }

        unset($columns[0]);

        return $columns;
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
