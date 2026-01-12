<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'division_id',
        'job_level',
        'talent_category',
        'position',
        'performance_score',
        'potential_score',
        'is_promotable',
        'notes',
    ];

    protected $casts = [
        'is_promotable' => 'boolean',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    // Talent Categories: High Potential, Promotable, Non Talent
    public function scopeHighPotential($query)
    {
        return $query->where('talent_category', 'High Potential');
    }

    public function scopePromotable($query)
    {
        return $query->where('talent_category', 'Promotable');
    }

    public function scopeNonTalent($query)
    {
        return $query->where('talent_category', 'Non Talent');
    }

    public function scopeByJobLevel($query, $level)
    {
        return $query->where('job_level', $level);
    }
}
