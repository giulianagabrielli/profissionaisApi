<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Professional;

class Technology extends Model
{
    protected $table = "technologies";

    public function professionals(){
        return $this->belongsToMany('Professional', 'professionals_has_technologies', 'technologies_id', 'professionals_id'); //primeira foreign é do model desse arquivo

    }
}
