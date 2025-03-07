<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class NewsCategory extends Model
{
    use HasFactory;

    protected $guarded = array('created_at', 'update_at');

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:d.m.Y',
        ];
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class,'id','created_by');
    }

    public function parent(): HasOne
    {
        return $this->hasOne(NewsCategory::class,'id','parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(NewsCategory::class,'parent_id','id');
    }

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class,'news_has_categories','category_id','news_id');
    }
}
