<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'father',
        'mother',
        'classroom_id',
        'phone_no',
        'address',
    ];

    // Relationship to Classroom
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}