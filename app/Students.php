<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    protected $table = "students";

    public $fillable = ['name','stdId','peopleId','major'];
}
