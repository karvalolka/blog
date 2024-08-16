<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $categories = Category::all();
        $tags = TAG::all();
        return view('admin.post.create', compact('categories', 'tags'));
    }
}
