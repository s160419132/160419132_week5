<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    //bisa melihat category sesuai dengan kolom category_id
    public function category(){
        
        return $this->belongsTo('App\Category','category_id');
    }
}
