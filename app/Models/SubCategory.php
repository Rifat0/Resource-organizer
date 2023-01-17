<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sub_categories';
    protected $primaryKey='sub_category_id';
    public $timestamps = true;

    protected $fillable = [
        'sub_category_id',
        'category',
        'sub_category_name',
        'status'
    ];

    protected $casts = [
        'deleted_at' => 'datetime',
    ];

    public function categoryInfo()
    {
        return $this->hasOne(Category::class, 'category_id', 'category');
    }
}
