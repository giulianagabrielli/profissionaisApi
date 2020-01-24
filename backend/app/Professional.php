<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Technology;


class Professional extends Model
{
    protected $table = "professionals";

    public function technologies(){

        return $this->hasMany(Technology::class, 'professionals_has_technologies', 'professionals_id', 'technologies_id'); //primeira foreign é do model desse arquivo

    }
}
