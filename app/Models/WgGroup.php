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

    public function shoppingListWgGroup()
    {
        return $this->hasMany(ShoppingList::class, 'wg_id');
    }

    public function financeWgGroup()
    {
        return $this->hasMany(Finance::class, 'wg_id');
    }

    public function chatWgGroup()
    {
        return $this->hasMany(Chat::class, 'wg_id');
    }

    public function cleaningPlanWgGroup()
    {
        return $this->hasMany(CleaningPlan::class, 'wg_id');
    }
/*     public function user() {
        return $this->belongsTo('User');
    }*/

}
