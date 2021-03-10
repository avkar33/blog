<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Article;

class Category extends Model
{
    use HasFactory;

    // mass assigment
    protected $fillable = ['title', 'slug', 'parent_id', 'published', 'created_by', 'modified_by'];

    // mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(
            mb_substr($this->title, 0, 40) . '-' . Carbon::now()->format('dmyHi'),
            '-'
        );
    }
    // get children category
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    // Polymoephic relation with articles

    public function articles()
    {
        return $this->morphedByMany(Article::class, 'categoryable');
    }

    public function scopePublished($query, $published)
    {
        return $query->where('published', $published);
    }
    public function scopeOrderByCreated($query)
    {
        return $query->orderBy('created_at');
    }
}
