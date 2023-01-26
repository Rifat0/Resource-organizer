<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemLocation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'item_locations';
    protected $primaryKey='item_location_id';
    public $timestamps = true;

    protected $fillable = [
        'item_location_id',
        'item',
        'location_name',
    ];
}
