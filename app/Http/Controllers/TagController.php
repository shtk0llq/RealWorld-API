<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Http\Resources\TagCollection;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        
        // return response()->json([
        //     'tags' => $tags
        // ]);

        return new TagCollection($tags);
    }
}
