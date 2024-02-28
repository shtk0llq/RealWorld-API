<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'article';

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "slug" => $this->slug,
            "title" => $this->title,
            "description" => $this->description,
            "body" => $this->body,
            // "tagList" => ["dragons", "training"],
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
