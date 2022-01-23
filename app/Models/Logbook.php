<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $primaryKey = 'Logbook_ID';
}

//baru