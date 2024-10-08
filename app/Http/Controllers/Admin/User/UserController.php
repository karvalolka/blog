<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
}
