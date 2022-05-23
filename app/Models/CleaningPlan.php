<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CleaningPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'cleaning_task',
        'update_trigger',
    ];

    public function wgGroupCleaningPlan()
    {
        return $this->belongsTo(WgGroup::class, 'wg_id');
    }
}
