<?php

namespace App\Models;

use App\Models\Task;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assign extends Model
{
    use HasFactory;
    public function task(){
        return $this->belongsTo(Task::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
