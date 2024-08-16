<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);

        $data['preview_image'] = isset($data['preview_image']) ? Storage::disk('public')->put('/image', $data['preview_image']) : $post->preview_image;
        $data['main_image'] = isset($data['main_image']) ? Storage::disk('public')->put('/image', $data['main_image']) : $post->main_image;

        $post->update($data);
        $post->tags()->sync($tagIds);
        return view('admin.post.show', compact('post'));
    }
}
