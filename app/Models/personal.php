<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personal extends Model
{
    use HasFactory;
    public function language_name(){
        return  $this->hasOne(language::class, 'id', 'language_id');  
      }
}
