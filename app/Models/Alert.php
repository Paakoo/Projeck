<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'message',
        'is_read',
        'employee_id',
        'division_id',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
