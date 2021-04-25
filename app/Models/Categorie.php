<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    protected $guarded = [];

    public function getItemsRelation(): HasMany
    {
        return $this->hasMany('App\Models\Item', 'category', 'name');
    }
}
