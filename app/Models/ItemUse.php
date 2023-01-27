<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemUse extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'item_use';
    protected $primaryKey='item_use_id';
    public $timestamps = true;
}
