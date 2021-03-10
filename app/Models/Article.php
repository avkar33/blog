<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\Category;

class Article extends Model
{
    use HasFactory;

    // mass assigment
    protected $fillable = [
        'title', 'slug', 'description_short', 'description', 'image', 'image_show',
        'meta_title', 'meta_description', 'meta_keyword',
        'published', 'viewed', 'created_by', 'modified_by'
    ];
    // mutators
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug(
            mb_substr($this->title, 0, 40) . '-' . Carbon::now()->format('dmyHi'),
            '-'
        );
    }
    // Polymoephic relation with categories
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoryable');
    }
}
