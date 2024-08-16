<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class EditController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        $tags = TAG::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }
}
