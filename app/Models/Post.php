<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];



//     use App\Models\Post;
// use Illuminate\Support\Str;

// $posts = Post::whereNull('slug')->orWhere('slug', '')->get();

// foreach ($posts as $post) {
//     $slug = Str::slug($post->title);
//     $count = Post::where('slug', 'LIKE', "{$slug}%")->count();
//     $post->slug = $count > 0 ? "{$slug}-" . ($count + 1) : $slug;
//     $post->save();
// }

// echo "Slugs updated!";


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            // Generate slug only if empty
            if (empty($post->slug)) {
                $slug = Str::slug($post->title);

                // Make unique slug
                $count = Post::where('slug', 'LIKE', "{$slug}%")->count();

            $post->slug = $count > 0 ? "{$slug}-" . ($count + 1) : $slug;
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
