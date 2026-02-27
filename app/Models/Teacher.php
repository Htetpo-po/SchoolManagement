<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'name',
    'role',
    'classroom_id',
    'subject',
    'salary',
    'phone_no',
    'address'
];
   public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}