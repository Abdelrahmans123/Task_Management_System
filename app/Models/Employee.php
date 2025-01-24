<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Employee extends Model
{
    use HasFactory,Notifiable;
    public function task(){
        return $this->belongsTo(Task::class);
    }
}
