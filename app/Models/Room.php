<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Room extends Model
{
    public $timestamps = false;
    use Uuids, HasFactory;

    public function status(){
        return $this->belongsTo(Roomstatus::class,'RoomStatus','id');
    }
}
