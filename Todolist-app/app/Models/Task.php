<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'task_name', 
        'task_details',
        'user_id',
        'status',
    ];

    public function checkOffTask(){
        $this->task_status = $this->task_status ? false : true;
        $this->status = $this->task_status ? "Done" : "Doing";
        $this->save();
    }
    

    public function user()
{
    return $this->belongsTo(User::class);
}
}

