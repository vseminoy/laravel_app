<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class News extends Model
{
    use HasFactory;
    protected $guarded = array('created_at', 'update_at');

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(NewsCategory::class,'news_has_categories','news_id','category_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: static fn (string $value) => ucfirst($value),
            set: static fn (string $value) => strtolower($value),
        );
    }

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime:d.m.Y',
        ];
    }
}
