<?php

namespace App\Models;

use App\Helpers\Constants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class BasicMineral extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'basic_minerals';

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

    /**
     * Get all basic mineral with auth user
     * 
     * @return array 
     */
    public static function getBasicMinerals(){
        $minerals = self::where('user_id', Auth::id())->first();
        $names = Constants::BASIC_MINERALS;
        foreach($names as $name){
            $output[$name] = $minerals->$name;
        }
        return $output;
    }

    public function increments($action, $value)
    {
        if(is_null($this->$action)){
            $this->update([$action => $value]);
        }
        $this->increment($action, $value);
        return $this;
    }
}
