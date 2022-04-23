<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class WgGroup extends Model
{
    use HasFactory;

    protected $table = 'wg_groups';

    protected $fillable = [
        'wg_name'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'wg_group_id');
    }

/*     public function user() {
        return $this->belongsTo('User');
    }*/

}
