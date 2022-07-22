<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Roomtariff extends Model
{
    public $timestamps = false;
    use Uuids, HasFactory;
}
