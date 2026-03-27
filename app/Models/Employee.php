<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'user_id',
        'role_id',
        'department_id',
        'fullname',
        'email',
        'phone_number',
        'address',
        'hire_date',
        'salary',
        'status',
    ];
}
