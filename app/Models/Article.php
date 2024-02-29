<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Tag;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['slug', 'title', 'description', 'body'];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function syncTags(array $tags):void
    {
        $tagsId = [];

        foreach($tags as $tagName) {
            $tag = Tag::firstOrCreate([
                'name' => $tagName
            ]);

            $tagsId[] = $tag->id;
        }

        $this->tags()->sync($tagsId);
    }
}
