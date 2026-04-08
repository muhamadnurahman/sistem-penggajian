<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kasbon extends Model
{
    use HasUuids, SoftDeletes;

    protected $fillable = [
        'employee_id',
        'amount',
        'description',
        'status',
        'is_paid',
        'date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
