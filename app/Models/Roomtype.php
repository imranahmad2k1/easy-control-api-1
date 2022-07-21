<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Traits\Uuids;

class Roomtype extends Model
{
    public $timestamps = false;
    use Uuids, HasFactory;
}
