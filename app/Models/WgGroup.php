<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WgGroup extends Model
{
    use HasFactory;

    protected $table = 'wg_groups';

    protected $fillable = [
        'wg_name', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('User');
    }

}
