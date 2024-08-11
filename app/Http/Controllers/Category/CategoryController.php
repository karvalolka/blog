<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {

        return view('admin.categories.index');
    }
}
