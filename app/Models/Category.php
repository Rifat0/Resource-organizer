<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey='category_id';
    public $timestamps = true;

    protected $fillable = [
        'category_id',
        'category_name',
        'author',
        'status'
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];
}
