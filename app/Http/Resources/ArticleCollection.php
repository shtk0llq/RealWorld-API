<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
// use App\Http\Resources\ArticleResource;

class ArticleCollection extends ResourceCollection
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'articles';

    /**
     * このリソースが収集するリソース
     *
     * @var string
     */
    public $collects = ArticleResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return parent::toArray($request);
    }

    /**
     * Getリソース配列とともに返す必要のある追加データ
     *
     * @return array<string, mixed>
     */
    public function with(Request $request): array
    {
        return [
            'articlesCount' => $this->collection->count()
        ];
    }
}
