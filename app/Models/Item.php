<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ItemLocation;
use App\Models\ItemUse;

class Item extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'item';
    protected $primaryKey='item_id';
    public $timestamps = true;

    protected $fillable = [
        'item_id'
    ];

    public function last_location()
    {
        return $this->hasOne(ItemLocation::class, 'item', 'item_id')->latest()->orderBy('item_location_id','desc');
    }

    public function locations()
    {
        return $this->hasMany(ItemLocation::class, 'item', 'item_id');
    }

    public function last_use()
    {
        return $this->hasOne(ItemUse::class, 'item', 'item_id')->latest()->orderBy('item_use_id','desc');
    }

    public function uses()
    {
        return $this->hasMany(ItemUse::class, 'item', 'item_id');
    }
}
