<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
     protected $table = 'emp_table';
    protected $fillable = [
        'name',
        'email',
        'number',
        'password',
        'image'
    ];

    protected $hidden = [
'created_at', 'updated_at',
];
}
