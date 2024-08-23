<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\PostUserLike;

class PersonalIndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $userId = auth()->id();
        $data = [
            'commentsCount' => Comment::where('user_id', $userId)->count(),
            'postUserLikedCount' => PostUserLike::where('user_id', $userId)->count(),
        ];
        return view('personal.main.index', compact('data'));
    }
}
