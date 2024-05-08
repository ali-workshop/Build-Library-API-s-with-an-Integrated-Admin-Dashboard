<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory;
    // protected $table = 'sub_categories';

    protected $fillable=
    [
        'name',
        'category_id',
    ];
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function books():HasMany
    {
        return $this->hasMany(Book::class);
    }
}
