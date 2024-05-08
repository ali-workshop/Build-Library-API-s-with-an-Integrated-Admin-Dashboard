<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'favorite',
        'publicationDate',
        'src',
        'briefDescription',
        'category_id',
        'sub_category_id',
        'author_id',
        'rate_id'
    ];
    
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategories():BelongsTo
    {
        return $this->belongsTo(SubCategory::class,'sub_category_id','id');
    }


    public function rate():BelongsTo
    {
        return $this->belongsTo(Rate::class);
    }

    public function author():BelongsTo
    {
        return $this->belongsTo(Author::class);

    }

}
