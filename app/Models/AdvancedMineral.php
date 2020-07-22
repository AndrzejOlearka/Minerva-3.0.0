<?php

namespace App\Models;

use App\Helpers\Constants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class AdvancedMineral extends Model
{
    /**
     * table name
     *
     * @var string
     */
    protected $table = 'advanced_minerals';

    protected $primaryKey = 'user_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'crystals', 'morganites', 'fluorites', 'aquamarines', 'painites', 'jadeites', 'cymophanes', 'opals', 'pearls'
    ];

    /**
     * Get all advanced mineral with auth user
     * 
     * @return array 
     */
    public static function getAdvancedMinerals(){
        $minerals = self::where('user_id', Auth::id())->first();
        $names = Constants::ADVANCED_MINERALS;
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
