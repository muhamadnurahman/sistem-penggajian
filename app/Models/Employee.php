<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Department;
use App\Models\Role;
use App\Models\Payroll;
use App\Models\User;

class Employee extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'user_id',
        'role_id',
        'department_id',
        'kasbon_id',
        'name',
        'email',
        'phone_number',
        'address',
        'hire_date',
        'status',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function payrolls()
    {
        return $this->hasMany(Payroll::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kasbons()
    {
        return $this->hasMany(Kasbon::class);
    }

}
