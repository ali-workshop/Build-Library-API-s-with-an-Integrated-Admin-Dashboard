<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
   
    use HasFactory;

    protected $table='categories';
    protected $fillable=
    [
    'name',
    ];
    protected $guarded = [];
public function subcategories()
    {
    return $this->hasMany(Subcategory::class);
    }
    public function books():HasMany
    {
        return $this->hasMany(Book::class);
    }


}
