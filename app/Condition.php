<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $table = 'condition';

    protected $fillable = [
         'condition_display_name','condition_name'
    ];
}
