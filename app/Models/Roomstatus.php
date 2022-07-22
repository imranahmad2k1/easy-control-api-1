<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Roomstatus extends Model
{
    public $timestamps = false;
    use Uuids, HasFactory;

    public function rooms(){
        return $this->hasMany(Room::class,'RoomStatus','id');
    }
}
