<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = []; 
    protected $table = "my_table";
    protected $primaryKey = "student_id";
    public $timestamps= false;
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'update_date';
}
